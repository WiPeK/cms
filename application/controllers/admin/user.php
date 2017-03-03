<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* User Controller in admin dashboard
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class User extends Admin_Controller {
	private $id_to_log;
	private $login_to_log;
	private $email_to_log;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$this->data['users'] = $this->dash_m->get();

		//count all users
		$count = $this->db->count_all_results('users');

		//pagination
		$perpage = 100;
		if($count > $perpage)
		{
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/');
			//$config['base_url'] = 'http://localhost/cms/ci/admin/user/';
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(3);
		}
		else
		{
			$this->data['pagination'] = '';
			$offset = 0;
		}
		// Fetch all users
		$this->db->limit($perpage, $offset);
		$this->data['users'] = $this->dash_m->get();
		
		// Load view

		$this->data['subview'] = 'admin/user/index';
		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

	public function edit ($id = NULL)
	{
		// Fetch a user or set a new one
		if ($id) {
			$this->data['user'] = $this->dash_m->get($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
		}
		else {
			$this->data['user'] = $this->dash_m->get_new();
		}
		
		// Set up the form
		$rules = $this->dash_m->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);

		$this->form_validation->set_message('required','Pole jest wymagane');
		$this->form_validation->set_message('min_length','Za mało znaków');
		$this->form_validation->set_message('max_length','Za dużo znaków');
		$this->form_validation->set_message('alpha_numeric','Pole może zawierać tylko litery i cyfry');
		$this->form_validation->set_message('matches','Powtórzenie hasła i hasło muszą do siebie pasować');
		$this->form_validation->set_message('valid_email','Email jest nieprawidłowy');
		$this->form_validation->set_message('unique','Zawartość pola musi być unikalna');
		$this->form_validation->set_message('numeric','Pole może zawierać tylko cyfry');
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->dash_m->array_from_post(array('login', 'email', 'password','del_code',));

			if(!empty($data['password'])) {
			    $data['password'] = md5($this->input->post('password'));
			} else {
			    // We don't save an empty password
			    unset($data['password']);
			}

			//zapis
			$this->dash_m->save($data, $id);
			
			//tworzenie logów
			$this->login_to_log = $data['login'];
			$this->email_to_log = $data['email'];

			if($id)
			{
				//jeżeli admin edytuje użytkownika
				$this->id_to_log = $id;
				$this->logi_m->create_log_edit_user($id,$this->login_to_log,$this->email_to_log);
			}
			else
			{
				//pobieranie id nowego uzytkownika
				$idu = $this->logi_m->get_new_user_id($data['login'],$data['email']);
				//jeżeli admin dodaje użytkownika
				$this->logi_m->create_log_add_user($idu,$this->login_to_log,$this->email_to_log);
			}
			
			redirect('admin/user');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view($this->admin_header, $this->data);
		$this->load->view($this->admin_layout, $this->data);
		$this->load->view($this->admin_footer, $this->data);
	}

	public function delete ($id)
	{
		$del_login = $this->logi_m->login_deleted_user($id);
		
		$this->user_m->delete($id);
		
		$this->logi_m->create_log_delete_user($id, $del_login);
		
		redirect('admin/user');
	}

	public function _unique_email ($str)
	{
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user
		
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->dash_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', 'Email musi być unikalny / jest już w użyciu');
			return FALSE;
		}
		
		return TRUE;
	}

	public function _unique_login ($str)
	{
		// Do NOT validate if login already exists
		// UNLESS it's the login for the current user
		
		$id = $this->uri->segment(4);
		$this->db->where('login', $this->input->post('login'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->dash_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_login', 'Login musi być unikalny / Jest już w użyciu');
			return FALSE;
		}
		
		return TRUE;
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */