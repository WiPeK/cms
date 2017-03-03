<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('migration');

		if ( ! $this->migration->current())
		{
			show_error($this->migration->error_string());

			$this->load->view($this->admin_header, $this->data);
			$this->load->view($this->admin_layout, $this->data);
			$this->load->view($this->admin_footer, $this->data);
		}
		else
		{
			$this->load->view($this->admin_header, $this->data);
			$this->load->view($this->admin_layout, $this->data);
			$this->load->view($this->admin_footer, $this->data);
		}
	}

}

/* End of file migrate.php */
/* Location: ./application/controllers/admin/migration.php */