<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Configuration controller
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Configuration extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['tod_post'] = $this->dash_m->get_art_todaypost();
		$this->data['cmsconfig'] = $this->dash_m->get_new_cmsconfig();
		$data['name'] = $this->data['cmsconfig']->name;
		$this->data['subview'] = 'admin/configuration/index';

		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

	public function cmsname()
	{
		$rules = $this->dash_m->rules_cmsconfig;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE && $this->session->userdata('mods') === 'admin') {
			
			$cmsname = $this->input->post('name');
			$this->dash_m->update_cms_name($cmsname);

			$this->logi_m->create_log_change_cmsname($data['name'], $cmsname);
			$this->cache->delete('cacheCMSCFG');
			$this->cache->delete('cacheSITENAME');
			//zamiast redirect zaladowac 1 widok z potwierdzeniem
			redirect('admin/configuration');
		}
	}

	public function cmsregulamin()
	{
		$rules = $this->dash_m->rules_cmsconfig;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE && $this->session->userdata('mods') === 'admin') {
			
			$cmsregulamin = $this->input->post('regulamin');
			$this->dash_m->update_cms_regulamin($cmsregulamin);
			$this->cache->delete('cacheCMSCFG');
			$this->logi_m->create_log_change_cmsregulamin();
			
			redirect('admin/configuration');
		}
	}

	public function upload_icon()
	{
		if($this->input->post('upload'))
		{	
			unlink('assets/images/favicon.ico');
			$this->gallery_path = 'assets/images/';

			$config = array(
				'upload_path' => $this->gallery_path,
				'allowed_types' => 'ico',
				'remove_spaces' => true,
				'overwrite' => true,
				'quality' => '100',
				'max_width' => '16',
				'max_heigth' => '16',
			);
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{	
				$this->data['error'] = 'There was a problem with your upload!';
				$this->data['subview'] = 'admin/configuration/index';

				$this->load->view($this->admin_header, $this->data);
				$this->load->view($this->admin_layout, $this->data);
				$this->load->view($this->admin_footer, $this->data);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$file = $data['upload_data']['file_name'];

				rename($this->gallery_path . '/' . $file , $this->gallery_path. '/' .'favicon.ico');

				$this->data = array(
					'favicon_url' => $this->gallery_path . '/' . 'favicon.ico',
				);
				$this->cache->delete('cacheCMSCFG');
				//save img data to db
				//$this->dash_m->save_favicon($this->data);
				$this->logi_m->create_log_upload_favicon();
				redirect('admin/configuration');
			}
		}
	}

	public function upload_logo()
	{
		if($this->input->post('upload'))
		{	
			//unlink(realpath(APPPATH . '../ci/images/') . '/favicon.ico');
			$this->logo_path = 'assets/logo/';

			$config = array(
				'upload_path' => $this->logo_path,
				'allowed_types' => 'jpg|jpeg|gif|png',
				'remove_spaces' => true,
				'overwrite' => true,
				'quality' => '100',
				'max_size' => 3000,
			);
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{	
				$this->data['error'] = 'There was a problem with your upload!';
				$this->data['subview'] = 'admin/configuration/index';

				$this->load->view($this->admin_header, $this->data);
				$this->load->view($this->admin_layout, $this->data);
				$this->load->view($this->admin_footer, $this->data);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$file = $data['upload_data']['file_name'];
				$file_ext = $data['upload_data']['file_ext'];

				$this->data = array(
					'logo_url' => 'assets/logo/' . $file . $file_ext,
				);

				//save img data to db
				$this->dash_m->save_logo($this->data);
				$this->logi_m->create_log_upload_logo();
				$this->cache->delete('cacheCMSCFG');
				redirect('admin/configuration');
			}
		}
	}

	public function today_post()
	{
		$rules = $this->dash_m->rules_todaypost;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			$this->dash_m->update_today_post($this->input->post('todaypost'));

			$this->logi_m->create_log_change_todaypost();
			$this->cache->delete('cacheCMSCFG');
			$this->cache->delete('cachePOAD');
			redirect('admin/configuration');
		}
		else
		{
			redirect(site_url() . 'admin/configuration');
		}
	}

	public function facebook_link()
	{
		$rules = $this->dash_m->rules_fb;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			$this->dash_m->update_fblink($this->input->post('fb_link'));

			$this->logi_m->create_log_change_fblink();
			$this->cache->delete('cacheCMSCFG');
			redirect('admin/configuration');
		}
		else
		{
			redirect(site_url() . 'admin/configuration');
		}
	}

	public function about_service()
	{
		$rules = $this->dash_m->rules_about;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			$this->dash_m->update_about($this->input->post('about_service'));

			$this->logi_m->create_log_change_about();
			$this->cache->delete('cacheCMSCFG');
			redirect(site_url('admin/configuration'));
		}
		else
		{
			redirect(site_url() . 'admin/configuration');
		}
	}

	public function description()
	{
		$rules = $this->dash_m->rules_description;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			$this->dash_m->update_description($this->input->post('description'));

			$this->logi_m->create_log_change_description();
			$this->cache->delete('cacheCMSCFG');
			redirect('admin/configuration');
		}
		else
		{
			redirect(site_url() . 'admin/configuration');
		}
	}

	public function keywords()
	{
		$rules = $this->dash_m->rules_keywords;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			$this->dash_m->update_keywords($this->input->post('keywords'));

			$this->logi_m->create_log_change_keywords();
			$this->cache->delete('cacheCMSCFG');
			redirect('admin/configuration');
		}
		else
		{
			redirect(site_url() . 'admin/configuration');
		}
	}

}

/* End of file configuration.php */
/* Location: ./application/controllers/configuration.php */