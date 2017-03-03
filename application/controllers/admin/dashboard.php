<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Dashboard Controller
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->admin_access() === false)
		{
			redirect(site_url());
		}
	}

	public function index()
	{	
		$this->data['browser_usage'] = $this->dash_m->get_browser_usage();
		$this->data['system_usage'] = $this->dash_m->get_system_usage();
		$this->data['browsers'] = $this->dash_m->get_browsers();

		$this->data['highcharts'] = true;
		$this->data['cdata'] = $this->dash_m->data_to_dashboard();

		$this->data['subview'] = 'admin/dashboard/index';
		
		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */