<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Logs Controller in admin dashboard
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Logs extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Fetch all logs
		$this->data['logs'] = $this->logi_m->get_logs();

		// Load view
		$this->data['subview'] = 'admin/logs/index';
		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

}

/* End of file logs.php */
/* Location: ./application/controllers/logs.php */