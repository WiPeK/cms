<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Page Controller in admin dashboard
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Page extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index ()
	{
		// Fetch all pages
		$this->data['pages'] = $this->page_m->get_with_parent();
		
		// Load view
		$this->data['subview'] = 'admin/page/index';

		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

	public function order ()
	{
		$this->data['sortable'] = TRUE;
		$this->data['subview'] = 'admin/page/order';

		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

	public function order_ajax ()
	{
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			$this->page_m->save_order($_POST['sortable']);
			$this->logi_m->create_log_order_page();
			$this->cache->delete('cacheMENU');
			$this->cache->delete('cacheMPAGES');
		}
		
		// Fetch all pages
		$this->data['pages'] = $this->page_m->get_nested();
		
		// Load view
		$this->load->view('admin/page/order_ajax', $this->data);
	}

	public function edit($id = NULL)
	{
		$this->data['error'] = '';
		// Fetch a page or set a new one
		if ($id) {
			$this->data['page'] = $this->page_m->get($id);
			count($this->data['page']) || $this->data['errors'][] = 'page could not be found';
		}
		else {
			$this->data['page'] = $this->page_m->get_new();
		}
		
		// Pages for dropdown
		$this->data['pages_no_parents'] = $this->page_m->get_no_parents();
		
		// Set up the form
		$rules = $this->page_m->rules;
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
			$img_link = str_replace(' ','',$this->input->post('title'));
			$config = array(
				'upload_path' => 'assets/pages_logos/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'max_size' => 3000,
				'remove_spaces' => true,
				'overwrite' => true,
				'quality' => '100',
				'file_name' => md5($img_link),
			);

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);

			// Process the form
			if ($this->form_validation->run() == TRUE) 
			{

				$this->data = $this->page_m->array_from_post(array(
					'title', 
					'slug', 
					'body', 
					'template', 
					'parent_id'
				));
				
				if($this->data['page']->logo == 0 || $this->data['page']->logo == null || $this->data['page']->logo == '' || $this->data['page']->logo == ' ')
				{
					if($this->upload->do_upload('page_logo'))
					{
						$data_img = array('upload_data' => $this->upload->data());
						$file = $data_img['upload_data']['file_name'];
						$imgtitle = str_replace(' ','',$this->input->post('title'));
						$this->data['logo'] = 'assets/pages_logos/' . md5($imgtitle) . $data_img['upload_data']['file_ext'];
					}
				}
				$this->data['order'] = 0;
				$this->page_m->save($this->data, $id);
				$this->cache->delete('cacheMENU');
				$this->cache->delete('cacheMPAGES');

				if($id)
				{
					//jeżeli admin edytuje strone
					$this->logi_m->create_log_edit_page($id, $this->data['title'], $this->data['slug']);
					redirect('admin/page/edit/' . $id);
				}
				else
				{
					//jeżeli admin dodaje strone
					//pobieranie id nowegej strony
					$idu = $this->logi_m->get_new_page_id($this->data['title']);
					
					$this->logi_m->create_log_add_page($idu, $this->data['title'], $this->data['slug']);
					redirect('admin/page/edit/' . $idu);
				}				
			}
			elseif($this->form_validation->run() == FALSE || !$this->upload->do_upload())
			{
				$this->data['files'] = $this->files_m->get_files();
				$this->data['error'] = 'There was a problem with your upload!';
				$this->data['subview'] = 'admin/page/edit';

				$this->load->view($this->admin_header, $this->data);
				$this->load->view($this->admin_layout, $this->data);
				$this->load->view($this->admin_footer, $this->data);
			}
		}

		
		
		// Load the view
		$this->data['files'] = $this->files_m->get_files();
		$this->data['subview'] = 'admin/page/edit';

		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

	public function staticpage($id = NULL)
	{
		$this->data['error'] = '';
		// Fetch a page or set a new one
		if ($id) {
			$this->data['page'] = $this->page_m->get($id);
			count($this->data['page']) || $this->data['errors'][] = 'page could not be found';
		}
		else {
			$this->data['page'] = $this->page_m->get_new();
		}
		
		// Pages for dropdown
		$this->data['pages_no_parents'] = $this->page_m->get_no_parents();
		
		// Set up the form
		$rules = $this->page_m->rules_static;
		$this->form_validation->set_rules($rules);

		$this->form_validation->set_message('required','Pole %s jest wymagane');
		$this->form_validation->set_message('min_length','Za mało znaków');
		$this->form_validation->set_message('max_length','Za dużo znaków');
		$this->form_validation->set_message('alpha_numeric','Pole %s może zawierać tylko litery i cyfry');
		$this->form_validation->set_message('matches','Powtórzenie hasła i hasło muszą do siebie pasować');
		$this->form_validation->set_message('valid_email','Email jest nieprawidłowy');
		$this->form_validation->set_message('unique','Zawartość %s pola musi być unikalna');
		$this->form_validation->set_message('numeric','Pole %s może zawierać tylko cyfry');

		if($this->form_validation->run() == true)
		{
			$data = array(
				'title' => $this->input->post('title'),
				'parent_id' => $this->input->post('parent_id'),
				'slug' => $this->input->post('slug'),
				'pageadress' => $this->input->post('pageadress'),
				'template' => 'static',
				'inc_def' => (int) $this->input->post('headnfoot'),
				'views' => 0,
				'body' => '',
				'logo' => ''
			);
			
			$this->page_m->save_static_page($data);
			$this->cache->delete('cacheMENU');
			$this->cache->delete('cacheMPAGES');
			redirect('admin/page');
		}
		else
		{
			$this->data['subview'] = 'admin/page/staticpage';

			$this->load->view($this->admin_header, $this->data);
			$this->load->view($this->admin_layout, $this->data);
			$this->load->view($this->admin_footer, $this->data);
		}

		// Load the view
		// $this->data['subview'] = 'admin/page/staticpage';
		// $this->data['navbar_admin'] = 'admin/dashboard/navbar_admin';

		// $this->load->view('admin/include/header', $this->data);
		// $this->load->view('admin/_layout_admin', $this->data);
		// $this->load->view('admin/include/footer', $this->data);
	}

	public function deletelogo($id = NULL)
	{
		if($this->page_m->get_pg_title($id) != false)
		{
			$logo = $this->page_m->get_pg_title($id);
			unlink($logo);
		}
		$this->page_m->delete_logo($id);
		
		redirect('admin/page');
	}

	public function delete ($id)
	{
		$del_title = $this->logi_m->title_deleted_page($id);
		if($this->page_m->get_pg_title($id) != false)
		{
			$logo = $this->page_m->get_pg_title($id);
			unlink($logo);
		}
		
		$this->page_m->delete($id);
		$this->cache->delete('cacheMENU');
		$this->cache->delete('cacheMPAGES');
		$this->logi_m->create_log_delete_page($id, $del_title);

		redirect('admin/page');
	}

	public function _unique_slug ($str)
	{
		// Do NOT validate if slug already exists
		// UNLESS it's the slug for the current page
		

		$id = $this->uri->segment(4);
		$this->db->where('slug', $this->input->post('slug'));
		! $id || $this->db->where('id !=', $id);
		$page = $this->page_m->get();
		
		if (count($page)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}

	public function _unique_title ($str)
	{
		// Do NOT validate if title already exists
		// UNLESS it's the title for the current page
		

		$id = $this->uri->segment(4);
		$this->db->where('title', $this->input->post('title'));
		! $id || $this->db->where('id !=', $id);
		$page = $this->page_m->get();
		
		if (count($page)) {
			$this->form_validation->set_message('_unique_title', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */