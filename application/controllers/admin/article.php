<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Article Controller in admin dashboard
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Article extends Admin_Controller {

	//constructor
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('article_m');
	}

	public function index ()
	{
		//count all articles
		$count = $this->db->count_all_results('articles');

		//pagination
		$perpage = 10;
		if($count > $perpage)
		{
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/');
			//$config['base_url'] = 'http://localhost/cms/ci/admin/user/';
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(3);
		}
		else
		{
			$this->data['pagination'] = '';
			$offset = 0;
		}
		// Fetch all articles
		$this->db->limit($perpage, $offset);
		$this->data['articles'] = $this->article_m->get();
		
		// Load view
		$this->data['subview'] = 'admin/article/index';

		$this->load->view('admin/include/header', $this->data);
		$this->load->view('admin/_layout_admin', $this->data);
		$this->load->view('admin/include/footer', $this->data);
	}

	public function edit($id = NULL)
	{
		$this->data['error'] = '';
		// Fetch a article or set a new one
		if ($id) {
			$this->data['article'] = $this->article_m->get($id);			
			count($this->data['article']) || $this->data['errors'][] = 'article could not be found';
		}
		else {
			$this->data['article'] = $this->article_m->get_new();
		}

		// Pages for dropdown
		$this->data['article_parent'] = str_replace(' ','_',$this->page_m->get_article_parents());
		
		// Set up the form
		$rules = $this->article_m->rules;
		$this->form_validation->set_rules($rules);

		$this->form_validation->set_message('required','Pole %s jest wymagane');
		$this->form_validation->set_message('min_length','Za mało znaków');
		$this->form_validation->set_message('max_length','Za dużo znaków');
		$this->form_validation->set_message('alpha_numeric','Pole %s może zawierać tylko litery i cyfry');
		$this->form_validation->set_message('matches','Powtórzenie hasła i hasło muszą do siebie pasować');
		$this->form_validation->set_message('valid_email','Email jest nieprawidłowy');
		$this->form_validation->set_message('unique','Zawartość %s pola musi być unikalna');
		$this->form_validation->set_message('numeric','Pole %s może zawierać tylko cyfry');
		
		if($this->input->post('submit'))
		{
			$title_ni = str_replace(' ','',$this->input->post('title'));
			$config = array(
				'upload_path' => 'assets/articles_logos/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'max_size' => 3000,
				'remove_spaces' => true,
				'overwrite' => true,
				'quality' => '100',
				'file_name' => md5($title_ni),
			);

			$this->load->library('upload', $config);
			
			// Process the form
			if ($this->form_validation->run() == TRUE) 
			{
				$this->data = $this->article_m->array_from_post(array(
					'title', 
					//'slug', 
					'body', 
					'pubdate',
					'category',
					'tags',
					'parent_page'
				));

				if($this->data['article']->logo == 0 || $this->data['article']->logo == null || $this->data['article']->logo == '' || $this->data['article']->logo == ' ')
				{
					if($this->upload->do_upload('article_logo'))
					{
						$data_img = array('upload_data' => $this->upload->data());
						$file = $data_img['upload_data']['file_name'];
						$imgtitle = str_replace(' ','',$this->input->post('title'));
						$this->data['logo'] = 'assets/articles_logos/' . md5($imgtitle) . $data_img['upload_data']['file_ext'];
					}
				}

				str_replace(' ','_', $this->data['parent_page']);

				if ($id) {			
					$this->data['modified_by'] = $this->session->userdata('login');
					$this->data['modified'] = date('Y-m-d H:i:s');
				}
				else {
					$this->data['created_by'] = $this->session->userdata('login');	
					$this->data['modified'] = '';	
					$this->data['modified_by'] = '';
					$this->data['positive'] = 0;
					$this->data['negative'] = 0;
				}

				$this->article_m->save($this->data, $id);
				$this->cache->delete('cacheNART');
				$this->cache->delete('cachePOP');
				$this->cache->delete('cacheMPAGES');

				if($id)
				{
					$this->logi_m->create_log_edit_article($id, $this->data['title'], $this->data['parent_page']);
					redirect('admin/article/edit/' . $id);
				}
				else
				{
					$idu = $this->logi_m->get_new_article_id($this->data['title']);
					$this->logi_m->create_log_add_article($idu, $this->data['title'], $this->data['parent_page']);
					redirect('admin/article/edit/' . $idu);
				}
			}
			else
			{
				$this->data['files'] = $this->files_m->get_files();
				$this->data['error'] = 'There was a problem with your upload!';
				$this->data['subview'] = 'admin/article/edit';

				$this->load->view('admin/include/header', $this->data);
				$this->load->view('admin/_layout_admin', $this->data);
				$this->load->view('admin/include/footer', $this->data);
			}
		}

		// Load the view
		$this->data['files'] = $this->files_m->get_files();
		$this->data['subview'] = 'admin/article/edit';

		$this->load->view('admin/include/header', $this->data);
		$this->load->view('admin/_layout_admin', $this->data);
		$this->load->view('admin/include/footer', $this->data);
	}

	public function deletelogo($id)
	{
		if($this->article_m->get_pg_title($id) != false)
		{
			$logo = $this->article_m->get_pg_title($id);
			unlink($logo);
		}	
		$this->article_m->delete_logo($id);
		redirect('admin/article');
	}

	public function delete ($id)
	{
		$del_title = $this->logi_m->title_deleted_article($id);
		if($this->article_m->get_pg_title($id) != false)
		{
			$logo = $this->article_m->get_pg_title($id);
			unlink($logo);
		}	
		
		$this->article_m->delete($id);
		$this->cache->delete('cacheNART');
		$this->cache->delete('cachePOP');
		$this->cache->delete('cacheMPAGES');

		$this->logi_m->create_log_delete_article($id, $del_title);

		redirect('admin/article');
	}

}

/* End of file article.php */
/* Location: ./application/controllers/article.php */