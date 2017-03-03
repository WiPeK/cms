<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Articles model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Article_m extends MY_Model {

	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication date', 
			'rules' => 'trim|required|xss_clean'
		), 
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|max_length[100]|url_title|xss_clean'
		), 
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
		),
		'category' => array(
			'field' => 'category', 
			'label' => 'Category', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'tags' => array(
			'field' => 'tags', 
			'label' => 'Tags', 
			'rules' => 'trim|max_length[100]|xss_clean'
		),
		'parent_page' => array(
			'field' => 'parent_page', 
			'label' => 'Strona', 
			'rules' => 'trim|max_length[100]|xss_clean'
		),
	);

	public function get_new ()
	{
		$article = new stdClass();
		$article->id = '';
		$article->created = date('Y-m-d H:i:s');
		$article->modified = '0000-00-00 00:00:00';
		$article->created_by = $this->session->userdata('login');
		$article->modified_by = '';
		$article->category = '';
		$article->tags = '';
		$article->parent_page = array();
		$article->positive = 0;
		$article->negative = 0;
		$article->title = '';
		//$article->slug = '';
		$article->body = '';
		$article->views = '';
		$article->logo = '';
		$article->pubdate = date('Y-m-d H:i:s');
		return $article;
	}
	
	public function delete_logo($id)
	{
		$this->db->query("UPDATE articles SET logo='' WHERE id='$id'");
	}

	public function get_pg_title($id)
	{
		$query = $this->db->query("SELECT logo FROM articles WHERE id='$id'");
		if($query->row('logo') != 0 || $query->row('logo') != null || $query->row('logo') != '' || $query->row('logo') != ' ')
		{	
			return $query->row('logo');
		}
		else
			return false;
		
	}
	
	public function set_published(){
		$this->db->where('pubdate <=', date('Y-m-d H:i:s'));
	}
	
	public function get_recent($limit = 3){
		
		// Fetch a limited number of recent articles
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}

	public function newest_art()
	{
		$this->set_published();
		$this->db->limit(5);
		$this->db->order_by('pubdate', "desc");
		$this->db->order_by('id', "desc");
		return parent::get(); 
	}

	public function popular_art()
	{
		$this->set_published();
		$this->db->limit(5);
		$this->db->order_by('views', "desc");
		return parent::get(); 
	}

	public function random_art()
	{
		$query = $this->db->query("SELECT * FROM articles ORDER BY RAND() LIMIT 4");
		return $query->result();
	}

	public function add_views($id)
	{
		$this->db->query("UPDATE articles SET views=views+1 WHERE id='$id'");
		if($this->db->affected_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function post_of_a_day($id)
	{
		$query = $this->db->query("SELECT * FROM articles WHERE id = '$id'");
		return $query->row();
	}

	public function get_artc($title)
	{
		$query = $this->db->query("SELECT * FROM articles WHERE parent_page = '$title' ORDER BY pubdate desc LIMIT 4");
		return $query->result();
	}

	public function get_to_pagination($parent_page)
	{
		$this->db->where('parent_page',$parent_page);
		$query = $this->db->count_all_results('articles');
		return $query;
	}

	public function get_similar_articles($title,$body)
	{
		$query = $this->db->query("SELECT * FROM articles WHERE title LIKE '%$title%' OR body LIKE '%$body%' ORDER BY pubdate DESC LIMIT 3");
		return $query->result();
	}

}

/* End of file article_m.php */
/* Location: ./application/models/article_m.php */