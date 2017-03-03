<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Admin Controller
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = $this->dash_m->fetch_config_name();
		$this->load->helper('form');
		$this->load->helper('file');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		$this->load->model('dash_m');
		$this->load->model('page_m');
		$this->load->model('logi_m');
		$this->load->helper('cms_helper');
		$this->load->model('files_m');
		$this->load->driver('cache', array('adapter' => 'file'));

		$this->data['navbar_admin'] = 'admin/dashboard/navbar_admin';
		$this->admin_header = 'admin/include/header';
		$this->admin_layout = 'admin/_layout_admin';
		$this->admin_footer = 'admin/include/footer';

		$this->dashboard_data();
		$this->data['menu'] = $this->page_m->get_nested();
		// $exception_uris = array(
		// 	'admin/user/login',
		// 	'admin/user/logout',
		// 	'admin/article',
		// 	'admin/migrate' //tylko przy testowaniu
		// 	);

		// if (in_array(uri_string(), $exception_uris) == FALSE)
		// {
		// 	if ($this->user_m->loggedin() == FALSE)
		// 	{
		// 		redirect ('admin/user/login');
		// 	}	
		// }
		if($this->admin_access() === false)
		{
			redirect(site_url());
		}	

		
	}

	public function admin_access()
	{
		if($this->user_m->loggedin() == FALSE && $this->session->userdata('mods') != 'admin')
		{
			return false;
			//redirect(site_url());
		}
		elseif($this->user_m->loggedin() == TRUE && $this->session->userdata('mods') != 'admin')
		{
			return false;
			//redirect(site_url());
		}
		elseif($this->user_m->loggedin() == FALSE && $this->session->userdata('mods') != 'admin')
		{
			return false;
			//redirect(site_url());
		}
		elseif($this->user_m->loggedin() == TRUE && $this->session->userdata('mods') == 'user')
		{
			return false;
			//redirect(site_url());
		}
		elseif($this->user_m->loggedin() == FALSE && $this->session->userdata('mods') == 'user')
		{
			return false;
			//redirect(site_url());
		}
		elseif($this->user_m->loggedin() == TRUE && $this->session->userdata('mods') === 'admin')
		{
			return true;
		}

	}

	public function dashboard_data()
	{
		//fetch admin data
		$login = $this->session->userdata('login');
		$amods = $this->session->userdata('mods');
		$id = $this->dash_m->get_admin_id($login, $amods);

		if($id)
		{
			$this->data['admin'] = $this->dash_m->get($id);
		}

	}
}

/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Admin_Controller.php */