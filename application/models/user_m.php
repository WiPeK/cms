<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* User model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class User_m extends MY_Model {
	protected $_table_name = 'users';
	protected $_order_by = 'id';
	public $rules = array(
		'login' => array(
			'field' => 'login',
			'label' => 'Login',
			'rules' => 'trim|xss_clean|required|min_length[3]|max_length[16]|alpha_numeric'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Hasło',
			'rules' => 'trim|xss_clean|required|min_length[4]|max_length[16]'
		),
	);
	public $global_message_rules = array(
		'subject' => array(
			'field' => 'subject',
			'label' => 'Subject',
			'rules' => 'trim|xss_clean|required|min_length[3]|alpha_numeric'
		),
		'message_body' => array(
			'field' => 'message_body',
			'label' => 'Message_body',
			'rules' => 'trim|xss_clean|required|min_length[4]'
		),
	);
	public $remind_password_rules = array(
		'field' => 'login',
		'label' => 'login',
		'rules' => 'trim|xss_clean|required|alpha_numeric',
	);

	public $change_password_rules = array(
		'old_password' => array(
			'field' => 'old_password',
			'label' => 'Hasło',
			'rules' => 'trim|xss_clean|required|min_length[4]|max_length[16]|callback__pass_password'
		),
		'new_password' => array(
			'field' => 'new_password',
			'label' => 'Nowe hasło',
			'rules' => 'trim|xss_clean|required|min_length[4]|max_length[16]|matches[cnew_password]'
		),
		'cnew_password' => array(
			'field' => 'cnew_password',
			'label' => 'Powtórzenie nowego hasła',
			'rules' => 'trim|xss_clean|required|min_length[4]|matches[new_password]'
		),
	);
	public $change_del_code_rules = array(
		'old_del_code' => array(
			'field' => 'old_del_code',
			'label' => 'Kod',
			'rules' => 'trim|xss_clean|required|min_length[4]|max_length[7]|callback__pass_delcode|numeric'
		),
		'new_del_code' => array(
			'field' => 'new_del_code',
			'label' => 'Nowy kod',
			'rules' => 'trim|xss_clean|required|min_length[4]|max_length[7]|matches[cnew_del_code]|numeric'
		),
		'cnew_del_code' => array(
			'field' => 'cnew_del_code',
			'label' => 'Powtórzenie nowego kodu',
			'rules' => 'trim|xss_clean|required|min_length[4]|matches[new_del_code]|numeric'
		),
	);

	public $change_email_rules = array(
		'old_email' => array(
			'field' => 'old_email',
			'label' => 'Stary email',
			'rules' => 'trim|xss_clean|required|callback__pass_email|callback__last_email_change|valid_email'
		),
		'new_email' => array(
			'field' => 'new_email',
			'label' => 'Nowy email',
			'rules' => 'trim|xss_clean|required|matches[cnew_email]|is_unique[users.email]|valid_email'
		),
		'cnew_email' => array(
			'field' => 'cnew_email',
			'label' => 'Powtórzenie nowego emaila',
			'rules' => 'trim|xss_clean|required|matches[new_email]|is_unique[users.email]|valid_email'
		),
	);

	public function __construct()
	{
		parent::__construct();
		
	}

	public function login($mods)
	{
		$user = $this->get_by(array(
			'login' => $this->input->post('login'),
			'password' => md5($this->input->post('password')),
			'mods' => $mods 
			), TRUE
		);

		if(count($user))
		{
			//log in user
			$data = array(
				'login' => $user->login,
				'mods' => $user->mods,
				'loggedin' => TRUE,
			);
			$this->last_log_in();
			$this->session->set_userdata($data);
			return TRUE;
		}
		//nieudane logowanie
		return FALSE;
	}
 
	public function is_key_valid($key)
	{
		$this->db->where('remind_key',$key);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1)
		{
			return true;
		}
		else
			return false;
	}

	public function is_valid_data($user_id,$key)
	{
		//$query = $this->db->query("SELECT old_pw, new_pw FROM change_data WHERE user_id = '$user_id' AND key_pw = '$key'");
		$query = $this->db->query("SELECT key_pw FROM change_data WHERE user_id = '$user_id'");
		if($query->row('key_pw') === $key)
		{
			return true;
		}
		else
			return false;
	}

	public function is_valid_data_c($user_id,$key)
	{
		//$query = $this->db->query("SELECT old_pw, new_pw FROM change_data WHERE user_id = '$user_id' AND key_pw = '$key'");
		$query = $this->db->query("SELECT key_del_code FROM change_data WHERE user_id = '$user_id'");
		if($query->row('key_del_code') === $key)
		{
			return true;
		}
		else
			return false;
	}

	public function is_valid_data_email($user_id,$key)
	{
		//$query = $this->db->query("SELECT old_pw, new_pw FROM change_data WHERE user_id = '$user_id' AND key_pw = '$key'");
		$query = $this->db->query("SELECT key_email FROM change_data WHERE user_id = '$user_id'");
		if($query->row('key_email') === $key)
		{
			return true;
		}
		else
			return false;
	}

	public function logout ()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function last_log_in()
	{
		$ost_log = date('Y-m-d H:i:s');
		$login = $this->input->post('login');
		$password = md5($this->input->post('password'));
		$this->db->query("UPDATE users SET last_login = '$ost_log' WHERE login='$login' AND password = '$password'");
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
		else
			return false;
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function save_key($key,$email)
	{
		$this->db->query("UPDATE users SET remind_key = '$key' WHERE email='$email'");
		if($this->db->affected_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function save_new_password($new_password,$email)
	{
		$new_password = md5($new_password);
		$this->db->query("UPDATE users SET password='$new_password' WHERE email='$email'");
	}

	public function get_email_remind($login)
	{
		$query = $this->db->query("SELECT email FROM users WHERE login='$login'");
		return $query->row('email');
	}

	public function get_email_to_new_password($key)
	{
		$query = $this->db->query("SELECT email FROM users WHERE remind_key='$key'");
		return $query->row('email');
	}

	public function show_mods($login, $password)
	{
		$query = $this->db->query("SELECT mods FROM users where login= '$login' and password= '$password'");
		if($query->row('mods') != 'user' || $query->row('mods') != 'admin')
				{
					return false;
				}

		return $query->row('mods');
	}

	public function get_data_user($id)
	{
		$query = $this->db->query("SELECT login,del_code,email,create_date,last_login FROM users WHERE id='$id'");
		return $query->row();
	}

	public function get_id_from_login($login)
	{
		$query = $this->db->query("SELECT id FROM users WHERE login='$login'");
		return $query->row('id');
	}

	public function get_id_from_change_data($login)
	{
		$query = $this->db->query("SELECT user_id FROM change_data WHERE login='$login'");
		return $query->row('user_id');
	}

	public function get_emails()
	{
		//$query = $this->db->query("SELECT email FROM users");
		//return $query->result();
		$this->db->select('email');
		$emails = parent::get();

		$array = array();
		if(count($emails))
		{
			foreach($emails as $email)
			{
				$array[$email->email] = $email->email;
			}
		}
		return $array;
	}

	public function get_password($login)
	{
		$query = $this->db->query("SELECT password FROM users WHERE login='$login'");
		return $query->row('password');
	}

	public function get_del_code($login)
	{
		$query = $this->db->query("SELECT del_code FROM users WHERE login='$login'");
		return $query->row('del_code');
	}

	public function save_change_pw($data)
	{
		$old_pw = $data['old_pw'];
		$new_pw = $data['new_pw'];
		$key_pw = $data['key_pw'];
		$user_id = $data['user_id'];
		$login = $data['login'];
		//sprawdzenie czy jest w tabeli juz login i id to update jezeli nie to insert
		if($this->search_id_and_login($data['user_id'], $data['login']) === true)
		{
			//update

			$this->db->query("UPDATE change_data SET old_pw = '$old_pw', new_pw = '$new_pw', key_pw = '$key_pw' WHERE user_id = '$user_id' AND login = '$login'");
			if($this->db->affected_rows() === 1)
			{
				return true;
			}
			else
				return false;
		}
		else
		{
			//insert
			$this->db->query("INSERT INTO change_data (user_id,login,old_pw,new_pw,key_pw) VALUES ('$user_id','$login','$old_pw','$new_pw','$key_pw')");
			if($this->db->affected_rows() === 1)
			{
				return true;
			}
			else
				return false;
		}
	}

	public function save_change_delcode($data)
	{
		$old_del_code = $data['old_del_code'];
		$new_del_code = $data['new_del_code'];
		$key_del_code = $data['key_del_code'];
		$user_id = $data['user_id'];
		$login = $data['login'];
		//sprawdzenie czy jest w tabeli juz login i id to update jezeli nie to insert
		if($this->search_id_and_login($data['user_id'], $data['login']) === true)
		{
			//update

			$this->db->query("UPDATE change_data SET old_del_code = '$old_del_code', new_del_code = '$new_del_code', key_del_code = '$key_del_code' WHERE user_id = '$user_id' AND login = '$login'");
			if($this->db->affected_rows() === 1)
			{
				return true;
			}
			else
				return false;
		}
		else
		{
			//insert
			$this->db->query("INSERT INTO change_data (user_id,login,old_del_code,new_del_code,key_del_code) VALUES ('$user_id','$login','$old_del_code','$new_del_code','$key_del_code')");
			if($this->db->affected_rows() === 1)
			{
				return true;
			}
			else
				return false;
		}
	}

	public function save_change_email($data)
	{
		$old_email = $data['old_email'];
		$new_email = $data['new_email'];
		$key_email = $data['key_email'];
		$user_id = $data['user_id'];
		$login = $data['login'];
		$last_change = $data['last_change'];
		//sprawdzenie czy jest w tabeli juz login i id to update jezeli nie to insert
		if($this->search_id_and_login($data['user_id'], $data['login']) === true)
		{
			//update

			$this->db->query("UPDATE change_data SET old_email = '$old_email', new_email = '$new_email', key_email = '$key_email' WHERE user_id = '$user_id' AND login = '$login'");
			if($this->db->affected_rows() === 1)
			{
				return true;
			}
			else
				return false;
		}
		else
		{
			//insert
			$this->db->query("INSERT INTO change_data (user_id,login,old_email,new_email,key_email) VALUES ('$user_id','$login','$old_email','$new_email','$key_email')");
			if($this->db->affected_rows() === 1)
			{
				return true;
			}
			else
				return false;
		}
	}

	public function search_id_and_login($user_id, $login)
	{
		$query = $this->db->query("SELECT id FROM change_data WHERE user_id='$user_id' AND login='$login'");
		if ($query->num_rows() === 1)
		{
			return true;
		}
		elseif ($query->num_rows() === 0)
		{
			return false;
		}
	}

	public function get_new_pw($user_id,$key)
	{
		$query = $this->db->query("SELECT new_pw FROM change_data WHERE user_id = '$user_id' AND key_pw = '$key'");
		return $query->row('new_pw');
	}

	public function get_new_del_code($user_id,$key)
	{
		$query = $this->db->query("SELECT new_del_code FROM change_data WHERE user_id = '$user_id' AND key_del_code = '$key'");
		return $query->row('new_del_code');
	}

	public function get_new_email($user_id,$key)
	{
		$query = $this->db->query("SELECT new_email FROM change_data WHERE user_id = '$user_id' AND key_email = '$key'");
		return $query->row('new_email');
	}

	public function save_new_pw_to_users($user_id,$new_pw)
	{
		$this->db->query("UPDATE users SET password='$new_pw' WHERE id='$user_id'");
		if($this->db->affected_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function save_new_del_code_to_users($user_id,$new_del_code)
	{
		$this->db->query("UPDATE users SET del_code='$new_del_code' WHERE id='$user_id'");
		if($this->db->affected_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function save_new_email_to_users($user_id,$new_email)
	{
		$this->db->query("UPDATE users SET email='$new_email' WHERE id='$user_id'");
		if($this->db->affected_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function update_last_change($now, $user_id)
	{
		$this->db->query("UPDATE change_data SET last_change='$now' WHERE user_id='$user_id'");
		if($this->db->affected_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function are_user_change_sth($login)
	{
		$query = $this->db->query("SELECT user_id FROM change_data WHERE login = '$login'");
		if($query->num_rows() === 1)
		{
			return true;
		}
		else
			return false;
	}

	public function get_last_email_change($login)
	{
		$query = $this->db->query("SELECT last_change FROM change_data WHERE login = '$login'");
		if($query->row('last_change') == '')
		{
			return date('0000-00-00 00:00:00');
		}
		else
		{
			return $query->row('last_change');
		}
	}

	public function get_new(){
		$user = new stdClass();
		$user->id = '';
		$user->login = '';
		$user->password = '';
		$user->email = '';
		$user->del_code = '';
		$user->create_date = '';
		$user->last_login = '';
		$user->mods = '';
		return $user;
	}


}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */