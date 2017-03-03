<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Page model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Page_m extends MY_Model {
	protected $_table_name = 'pages';
	protected $_order_by = 'parent_id, order';
	public $rules = array(
		'parent_id' => array(
			'field' => 'parent_id', 
			'label' => 'Parent', 
			'rules' => 'trim|intval'
		), 
		'template' => array(
			'field' => 'template', 
			'label' => 'Template', 
			'rules' => 'trim|required|xss_clean'
		), 
		'title' => array(
			'field' => 'title', 
			'label' => 'Tytuł', 
			'rules' => 'trim|required|max_length[100]|xss_clean|callback__unique_title'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Alias', 
			'rules' => 'trim|required|min_length[3]|max_length[100]|url_title|callback__unique_slug|xss_clean'
		), 
		'body' => array(
			'field' => 'body', 
			'label' => 'Treść', 
			'rules' => 'trim|required'
		)
	);
	public $rules_static = array(
		'parent_id' => array(
			'field' => 'parent_id', 
			'label' => 'Parent', 
			'rules' => 'trim|intval'
		), 
		'title' => array(
			'field' => 'title', 
			'label' => 'Tytuł', 
			'rules' => 'trim|required|max_length[100]|xss_clean|callback__unique_title'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Alias', 
			'rules' => 'trim|required|min_length[3]|max_length[100]|url_title|callback__unique_slug|xss_clean'
		), 
		'headnfoot' => array(
			'field' => 'headnfoot', 
			'label' => 'Komponenty', 
			'rules' => 'trim|xss_clean'
		),
		'pageadress' => array(
			'field' => 'pageadress', 
			'label' => 'Ścieżka', 
			'rules' => 'trim|required'
		), 

	);
	public function __construct()
	{
		parent::__construct();
		
	}


	public function get_new ()
	{
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->body = '';
		$page->parent_id = 0;
		$page->logo = '';
		$page->template = 'page';
		return $page;
	}

	public function delete_logo($id)
	{
		$this->db->query("UPDATE pages SET logo='' WHERE id='$id'");
	}

	public function get_archive_link(){
		$page = parent::get_by(array('template' => 'news_archive'), TRUE);
		return isset($page->slug) ? $page->slug : '';
	}

	public function get_pg_title($id)
	{
		$query = $this->db->query("SELECT logo FROM pages WHERE id='$id'");
		if($query->row('logo') != 0 || $query->row('logo') != null || $query->row('logo') != '' || $query->row('logo') != ' ')
		{
			return $query->row('logo');
		}
		else
			return false;
	}
	
	public function delete ($id)
	{
		// Delete a page
		parent::delete($id);
		
		// Reset parent ID for its children
		$this->db->set(array(
			'parent_id' => 0
		))->where('parent_id', $id)->update($this->_table_name);
	}

	public function save_order ($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
				}
			}
		}
	}

	public function get_nested ()
	{
		$this->db->order_by($this->_order_by);
		$pages = $this->db->get('pages')->result_array();
		
		$array = array();
		foreach ($pages as $page) {
			if (! $page['parent_id']) {
				// This page has no parent
				$array[$page['id']] = $page;
			}
			else {
				// This is a child page
				$array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}

	public function get_with_parent ($id = NULL, $single = FALSE)
	{
		$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
		$this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
		return parent::get($id, $single);
	}

	public function get_no_parents ()
	{
		// Fetch pages without parents
		$this->db->select('id, title');
		$this->db->where('parent_id', 0);
		$pages = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->id] = $page->title;
			}
		}
		
		return $array;
	}

	public function get_article_parents ()
	{
		// Fetch pages without parents
		$this->db->select('title');
		$this->db->where('template', 'news_archive');
		$pages = parent::get();
		
		// Return key => value pair array
		$array = array(
			//0 => 'No parent'
		);
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[str_replace(' ', '_', $page->title)] = $page->title;
			}
		}
		
		return $array;
	}

	public function add_views($id)
	{
		$this->db->query("UPDATE pages SET views=views+1 WHERE id='$id'");
		if($this->db->affected_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function get_pages_to_home()
	{
		$query = $this->db->query("SELECT title FROM pages WHERE template = 'news_archive'");
		return $query->result();
	}

	public function save_static_page($data)
	{
		$this->db->insert('pages',$data);
	}
}

/* End of file page_m.php */
/* Location: ./application/models/page_m.php */