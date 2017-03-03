<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Search model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Search_m extends MY_Model {

	public $front_search_rules = array(
		'search_input' => array(
			'field' => 'search_input', 
			'label' => 'Szukaj', 
			'rules' => 'trim|xss_clean|min_length[3]|alpha_numeric'
		),
	);

	public function __construct()
	{
		parent::__construct();	
	}

	public function get_tags_data($tag)
	{
		$query = $this->db->query("SELECT * FROM articles WHERE tags LIKE '%$tag%' ORDER BY pubdate DESC");
		return $query->result();
	}

	public function get_category_data($category)
	{
		$query = $this->db->query("SELECT * FROM articles WHERE category LIKE '%$category%' ORDER BY pubdate DESC");
		return $query->result();
	}

	public function get_search_art($data)
	{
		$query = $this->db->query("SELECT * FROM articles WHERE title LIKE '%$data%' or body LIKE '%$data%' or category LIKE '%$data%' or tags LIKE '%$data%' ORDER BY pubdate DESC");
		return $query->result();
	}

	public function get_search_pg($data)
	{
		$query = $this->db->query("SELECT * FROM pages WHERE title LIKE '%$data%' or body LIKE '%$data%'");
		return $query->result();
	}

	public function get_date_data($data)
	{
		$query = $this->db->query("SELECT * FROM articles WHERE pubdate = '$data'");
		return $query->result();
	}

}

/* End of file search_m.php */
/* Location: ./application/models/search_m.php */