<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Register model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Register_m extends MY_Model {

	protected $_table_name_temp = 'temp_users';
	protected $_table_name = 'users';
	public $rules = array(
		'login' => array(
			'field' => 'loginr',
			'label' => 'Login',
			'rules' => 'trim|xss_clean|required|is_unique[users.login]|min_length[3]|max_length[16]|alpha_numeric'
		),
		'password' => array(
			'field' => 'passwordr',
			'label' => 'Hasło',
			'rules' => 'trim|xss_clean|required|min_length[4]|max_length[16]|matches[password_c]'
		),
		'password_c' => array(
			'field' => 'password_c',
			'label' => 'Powtórzenie hasła',
			'rules' => 'trim|xss_clean|required|min_length[4]|matches[password]'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|xss_clean|required|is_unique[users.email]|valid_email|matches[email_c]'
		),
		'email_c' => array(
			'field' => 'email_c',
			'label' => 'Powtórzenie email',
			'rules' => 'trim|xss_clean|required|is_unique[users.email]|valid_email|matches[email]'
		),
		'del_code' => array(
			'field' => 'del_code',
			'label' => 'Kod usunięcia',
			'rules' => 'trim|xss_clean|required|numeric'
		),
		'captcha' => array(
			'field' => 'captcha',
			'label' => 'Captcha',
			'rules' => 'required|trim|strip_tags|xss_clean|callback_captcha_check|match_captcha[captcha.word]'
		),
	);

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add_temp_user($key)
	{
		$data = array(
			'login' =>$this->input->post('loginr'),
			'password' =>md5($this->input->post('passwordr')),
			'email' =>$this->input->post('email'),
			'del_code' =>$this->input->post('del_code'),
			'create_date' => date('Y-m-d H:i:s'),
			'last_login' => date('Y-m-d H:i:s'),
			'key' => $key
		);

		$query = $this->db->insert('tempusers',$data);
		if ($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function is_key_valid($key)
	{
		$this->db->where('key',$key);
		$query = $this->db->get('tempusers');

		if ($query->num_rows() == 1)
		{
			return true;
		}
		else
			return false;
	}

	public function add_user($key)
	{
		$this->db->where('key',$key);
		$temp_user = $this->db->get('tempusers');

		if ($temp_user)
		{
			$row = $temp_user->row();

			$data = array(
				'login' => $row->login,
				'password' => $row->password,
				'email' => $row->email,
				'del_code' => $row->del_code,
				'create_date' => $row->create_date,
				'last_login' => $row->last_login,
				'mods' => 'user',
			);


			$did_add_user = $this->db->insert('users', $data);
		}

		if ($did_add_user)
		{
			$this->db->where('key',$key);
			$this->db->delete('tempusers');
			return $data['email'];
		} return false;


	}

	public function create_image()
	{
		$capstr = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","w","x","y","z");
		$word = '';
		$n = 0;
		while($n<8)
		{
			$word .=$capstr[mt_rand(0, 34)];
			$n++;
		}

		$captcha = array(
			'word' => strtoupper($word),
			'img_path' => 'assets/captcha/',
			'img_url' => 'assets/captcha/',
			'font_path' => '/fonts/impact.ttf',
			'img_width' => '300',
			'img_height' => '50',
			'expiration' => '60',
			'captcha_time' => time()
		);

		$expire = $captcha['captcha_time'] - $captcha['expiration'];
		
		$value = array (
			'captcha_time' => $captcha['captcha_time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $captcha['word']
		);

		//usuwanie istniejacych captcha
		$this->db->where('captcha_time <', $expire);
		$this->db->delete('captcha');
		
		//dodawanie captcha do bazy
		$this->db->insert('captcha', $value);
		
		$img = create_captcha($captcha);
		return $data['image'] = $img['image'];
	}

	public function fetch_regulamin()
	{
		$query = $this->db->query("SELECT regulamin FROM cmsconfig LIMIT 1");
		return $query->row('regulamin');
	}

}

/* End of file register_m.php */
/* Location: ./application/models/register_m.php */