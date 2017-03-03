<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Log model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Logi_m extends MY_Model {
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_logs()
	{
		$query = $this->db->query("SELECT * FROM logs ORDER BY logdate DESC");
		return $query->result();
	}

	/* Tworzenie logów z zarządzania użytkownikami */

	public function create_log_edit_user($idu,$login_to_log,$email_to_log)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' edytował użytkownika o ' . anchor(site_url() . '/user/' . $idu, 'ID') . ' = ' . $idu . ' Login: ' . $login_to_log . ' Email: ' . $email_to_log;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_add_user($idu,$login_to_log,$email_to_log)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' stworzył użytkownika o ' . anchor(site_url() . '/user/' . $idu, 'ID') . ' = ' . $idu . ' Login: ' . $login_to_log . ' Email: ' . $email_to_log;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function get_new_user_id($login,$email)
	{
		$query = $this->db->query("SELECT id FROM users WHERE login = '$login' AND email='$email'");
		return $query->row('id');
	}

	public function login_deleted_user($id)
	{
		$query = $this->db->query("SELECT login FROM users WHERE id='$id'");
		return $query->row('login');
	}

	public function create_log_delete_user($id, $del_login)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' usunął użytkownika o ID = ' . $id . ' Login: ' . $del_login;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	/* Tworzenie logów z zarządzania użytkownikami */


	/* Tworzenie logów z zarządzania stronami */

	public function create_log_edit_page($idu,$title, $slug)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' edytował stronę o ' . anchor(site_url() . $slug, 'ID') . ' = ' . $idu . ' Tytuł: ' . anchor(site_url() . $slug, $title);
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_add_page($idu,$title, $slug)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' stworzył stronę o ' . anchor(site_url() . $slug, 'ID') . ' = ' . $idu . ' Tytuł: ' . anchor(site_url() . $slug, $title);
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function get_new_page_id($title)
	{
		$query = $this->db->query("SELECT id FROM pages WHERE title = '$title'");
		return $query->row('id');
	}

	public function create_log_order_page()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił kolejność stron na ' . anchor(site_url() . 'admin/page/order', 'Aktualna kolejność');
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function title_deleted_page($id)
	{
		$query = $this->db->query("SELECT title FROM pages WHERE id='$id'");
		return $query->row('title');
	}

	public function create_log_delete_page($id, $del_title)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' usunął stronę o ID = ' . $id . ' Tytuł: ' . $del_title;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	/* Tworzenie logów z zarządzania stronami */

	/* Tworzenie logów z zarządzania artykułami */

	public function create_log_edit_article($idu,$title, $parent_page)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' edytował artukuł o ' . anchor(site_url() . 'article/' . $parent_page . '/' . $idu, 'ID') . ' = ' . $idu . ' Tytuł: ' . anchor(site_url() . 'article/' . $parent_page . '/' . $idu, $title);
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_add_article($idu,$title, $slug)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' stworzył artukuł o ' . anchor(site_url() . 'article/' . $parent_page . '/' . $idu, 'ID') . ' = ' . $idu . ' Tytuł: ' . anchor(site_url() . 'article/' . $parent_page . '/' . $idu, $title);
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function get_new_article_id($title)
	{
		$query = $this->db->query("SELECT id FROM articles WHERE title = '$title'");
		return $query->row('id');
	}

	public function title_deleted_article($id)
	{
		$query = $this->db->query("SELECT title FROM articles WHERE id='$id'");
		return $query->row('title');
	}

	public function create_log_delete_article($id, $del_title)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' usunął artykuł ID = ' . $id . ' Tytuł: ' . $del_title;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	/* Tworzenie logów z zarządzania artykułami */

	/* Tworzenie logów z zarządzania cms */

	public function create_log_change_cmsname($oldname, $newname)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił nazwę portalu z ' . $oldname . ' na ' . anchor(site_url() . 'admin/configuration/cmsname',$newname);
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_change_cmsregulamin()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zedytował regulamin  ' . anchor(site_url() . 'admin/configuration/cmsregulamin','Nowy regulamin');
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_upload_logo()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił logo.';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_upload_favicon()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił ikonę.';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	/* Tworzenie logów z zarządzania cms */

	/* Tworzenie logów z wysyłania wiadomości */

	public function create_log_send_global_message()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' wysłał wiadomość do wszystkich użytkowników';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}
	/* Tworzenie logów z wysyłania wiadomości */

	/* Tworzenie logów z rejestracji */
	
	/* Tworzenie logów z rejestracji */

	/* Tworzenie logów z uploadowania obrazkow */

	public function create_log_upload_image($img_title)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zuploadowal obrazek o tytule: ' . anchor(base_url() . '../assets/images/' . $img_title . '.jpg', $img_title);
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	/* Tworzenie logów z uploadowania obrazkow */

	/* Tworzenie logów z usuwanie obrazkow */

	public function create_log_delete_image($img_title)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' usunął obrazek o tytule: ' . $img_title;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	/* Tworzenie logów z usuwanie obrazkow */

	public function create_log_answer_support($id)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' odpowiedział na zgłoszenie: ' . anchor(base_url() . 'admin/support/show_answered/' . $id, $id);
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_change_todaypost()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił post dnia';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_change_fblink()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił link do facebook';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_change_description()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił description';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_change_keywords()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił keywords';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_change_about()
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zmienił opis strony';
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_upload_file($file_title, $file_extension)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' zuploadowal plik: ' . $file_title . $file_extension;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}

	public function create_log_delete_file($file_title)
	{
		$log_date = date('Y-m-d H:i:s');
		$admin_name = $this->session->userdata('login');
		$log_body = 'Administrator: ' . $admin_name . ' usunął plik: ' . $file_title;
		$data = array(
			'logdate' => $log_date,
			'logbody' => $log_body
		);
		$this->db->insert('logs',$data);
	}
}

/* End of file logi_m.php */
/* Location: ./application/models/logi_m.php */