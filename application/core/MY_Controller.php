<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->data['errors'] = array();
		$this->load->model('dash_m');
		$this->load->model('support_m');
	}

	public function index()
	{
		
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */