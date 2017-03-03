<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Gallery model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Gallery_m extends MY_Model {

	var $gallery_path;
	var $gallery_path_url;

	protected $_table_name = 'gallery';
	protected $_order_by = 'add_date';

	public function __construct()
	{
		parent::__construct();

		$this->gallery_path = 'assets/images/gallery/';
		$this->gallery_path_url = 'assets/images/gallery/';
	}

	public function get_images_url()
	{
		$images_url = parent::get();

		$images = array();
		if(count($images_url))
		{
			foreach($images_url as $image_url)
			{
				$images[] = array(
					'id' => $image_url->id,
					'img_title' => $image_url->img_title,
					'img_describe' => $image_url->img_describe,
					'img_who_add' => $image_url->img_who_add,
					'add_date' => $image_url->add_date,
					'img_url' => $image_url->img_url,
					'thumb_url' => $image_url->thumb_url,
				);
			}
		}
		return $images; 
	}

	public function get_images_footer()
	{
		$query = $this->db->query("SELECT id,thumb_url FROM gallery ORDER BY RAND() LIMIT 9");
		
		$array = array();
		if (count($query->result())) {
			foreach ($query->result() as $row) {
				$array[$row->id] = $row->thumb_url;
			}
		}
		return $array;
	}

	public function save_img($image)
	{
		//dodanie danych obrazka do bazy danych
		$add_date = date('Y-m-d H:i:s');
		$who_add = $this->session->userdata('login');
		$data = array(
			'img_title' => $image['img_title'],
			'img_describe' => $image['opis'],
			'img_who_add' => $who_add,
			'add_date' => $add_date,
			'img_url' => $image['img_url'],
			'thumb_url' => $image['thumb_url'],
		);
		$this->db->insert('gallery',$data);
	}

	public function get_to_delete($id)
	{
		$query = $this->db->query("SELECT img_url, thumb_url, img_title FROM gallery WHERE id = '$id'");
		
		if($query->num_rows() >  0)
		{
			foreach($query->result() as $row)
			{
				$data['img_url'] = $row->img_url;
				$data['thumb_url'] = $row->thumb_url;
				$data['img_title'] = $row->img_title;
			}
		}

		return $data;
	}

	public function delete_image($id)
	{	
		$this->db->query("DELETE FROM gallery WHERE id = '$id'");
	}

}

/* End of file gallery_m.php */
/* Location: ./application/models/gallery_m.php */