<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Search Controller
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Search extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('search_m');
	}

	/**
	 * Function name
	 *
	 * what the function does
	 *
	 * @param (type) (name) about this param
	 * @return (type) (name)
	 */

	public function results()
	{
		$rules = $this->search_m->front_search_rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			$this->data['search_data_art'] = $this->search_m->get_search_art($this->input->post('search_input'));
			$this->data['search_data_pg'] = $this->search_m->get_search_pg($this->input->post('search_input'));

			$this->data['subview'] = 'templates/search_results';

			$this->load->view('include/header', $this->data);
	        $this->load->view('_m_layout', $this->data);
	        $this->load->view('include/footer', $this->data);
		}
		else
		{
			redirect(site_url());
		}
	}

	public function tags_menager($tag)
	{
		$this->data['search_data'] = $this->search_m->get_tags_data($tag);
		//zaladowanie widoku
		$this->data['subview'] = 'templates/search';

		$this->load->view('include/header', $this->data);
        $this->load->view('_m_layout', $this->data);
        $this->load->view('include/footer', $this->data);
	}

	public function category_menager($category)
	{
		$this->data['search_data'] = $this->search_m->get_category_data($category);
		//zaladowanie widoku
		$this->data['subview'] = 'templates/search';

		$this->load->view('include/header', $this->data);
        $this->load->view('_m_layout', $this->data);
        $this->load->view('include/footer', $this->data);
	}

	public function date_menager($date)
	{
		$this->data['search_data'] = $this->search_m->get_date_data($date);
		//zaladowanie widoku
		$this->data['subview'] = 'templates/search';

		$this->load->view('include/header', $this->data);
        $this->load->view('_m_layout', $this->data);
        $this->load->view('include/footer', $this->data);
	}

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */