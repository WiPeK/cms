<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* User Controller
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class User extends Frontend_Controller {

	private $remind_password_email;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->library('email', array(
    			'mailtype' => 'html',
    			'protocol' => 'smtp',
    			'smtp_host' => 'ssl://smtp.gmail.com',
    			'smtp_port' => '465',
    			'smtp_timeout' => '7',
    			'smtp_user' => '',
    			'smtp_pass' => '',
    			'charset' => 'utf-8',
    			'newline' => "\r\n",
    			));
    		
	}

	public function index()
	{
		redirect('user/login');
	}

	public function members()
	{
		$this->load->view('include/header', $this->data);
		$this->load->view('user/members', $this->data);
		$this->load->view('include/footer', $this->data);
	}

	public function login()
	{	
		//redirect if login
		if($this->user_m->loggedin() == TRUE && $this->session->userdata('mods') === 'admin')
		{
			redirect('admin/dashboard');
		}
		elseif($this->user_m->loggedin() == TRUE && $this->session->userdata('mods') === 'user')
		{
			redirect(base_url());
		}

		//set form
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);

		//process form
		if($this->form_validation->run() == TRUE)
		{
			//we can login and redirect
       		$login = $this->input->post('login');
        	$password = md5($this->input->post('password'));
			$mods = $this->user_m->show_mods($login, $password);
			
			if($this->user_m->login($mods) == TRUE)
			{	
				if($mods == false)
				{
					redirect('user/login', 'refresh');
				}
					if($mods === 'admin')
					{
						redirect('admin/dashboard');
					}
					elseif($mods === 'user')
					{
						redirect(site_url());
					}
					else
					{
						redirect('user/login');
					}
			}
			else {
				$this->session->set_flashdata('error', 'That email/password combination does not exist');
				redirect(site_url());
			}
		}
        redirect(site_url());
	}

	public function forgotten_password()
	{
        $this->form_validation->set_rules('loginf', 'Login', 'trim|xss_clean|required|alpha_numeric');
        $this->form_validation->set_message('required','Pole %s jest wymagane');

        if($this->form_validation->run() === false)
        {
        	$this->data['subview'] = 'user/remind';
	    	$this->load->view('include/header', $this->data);
        	$this->load->view('_m_layout', $this->data);
        	$this->load->view('include/footer', $this->data);
        }
        else
        {
        	$key = md5(uniqid());
        	//znalezienie emaila uzytkownika o loginie z inputa
        	$email = $this->user_m->get_email_remind($this->input->post('loginf'));
        	$this->remind_password_email = $email;
        	//zapis klucza do podanego uzytkownika o loginie z inputa
        	//wyslanie emaila

    		$this->email->from('wipekxxx@gmail.com', 'Krzysiek');
    		$this->email->to($email);
    		$this->email->subject("Przypomnienie hasła");
    		$message = '<p>Wysłałeś/aś żądanie o przypomnienie hasła.</p>';
    		$message .= '<p>Jeżeli to nie ty wypełniłeś/aś formularz przypomnienia hasła, zignoruj tego emaila.</p>';
    		$message .= '<p>Aby uzyskać nowe hasło kliknij w poniższy link</p>';
    		$message .= "<p><a href='".base_url()."user/remaind_password/$key'>Kliknij tutaj</a> aby uzyskać nowe hasło.</p>";

    		$this->email->message($message);

        	if($this->user_m->save_key($key,$email) === true)
        	{
        		if($this->email->send())
    			{
                    $this->data['subview'] = 'user/email_send';
                    $this->load->view('include/header', $this->data);
                    $this->load->view('_m_layout', $this->data);
                    $this->load->view('include/footer', $this->data);
    			}
    			else
    			{
                    $this->data['subview'] = 'user/email_send_failed';
                    $this->load->view('include/header', $this->data);
                    $this->load->view('_m_layout', $this->data);
                    $this->load->view('include/footer', $this->data);
    			}
        	}
        }

    }

    public function remaind_password($key)
    {
    	if($this->user_m->is_key_valid($key))
    	{
    		//send email with new password

    		$capstr = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","w","x","y","z");
			$new_password = '';
			$n = 0;
			while($n<9)
			{
				$new_password .=$capstr[mt_rand(0, 34)];
				$n++;
			}

			$r_email = $this->user_m->get_email_to_new_password($key);

    		$this->email->from('wipekxxx@gmail.com', 'Krzysiek');
    		$this->email->to($r_email);
    		$this->email->subject("Nowe hasło");
    		$message = '<p>Wygenerowane nowe hasło to.</p>';
    		$message .= $new_password;
    		$message .= "<p><a href='".base_url()."user/login'>Kliknij tutaj</a> aby się zalogować.</p>";
    		$this->email->message($message);
    		
        	
        	if($this->user_m->save_new_password($new_password,$r_email));
        	{
        		if($this->email->send())
    			{
                    $this->data['subview'] = 'user/email_send';
                    $this->load->view('include/header', $this->data);
                    $this->load->view('_m_layout', $this->data);
                    $this->load->view('include/footer', $this->data);
    			}
    			else
    			{
                    $this->data['subview'] = 'user/email_send_failed';
                    $this->load->view('include/header', $this->data);
                    $this->load->view('_m_layout', $this->data);
                    $this->load->view('include/footer', $this->data);
    			}
    		}

    	}
    	else
    	{
            $this->data['subview'] = 'user/bad_key';
            $this->load->view('include/header', $this->data);
            $this->load->view('_m_layout', $this->data);
            $this->load->view('include/footer', $this->data);
    	}
    }

	public function logout ()
	{
		$this->user_m->logout();
		redirect(site_url());
	}

	/* zmiana hasła */
	public function change_password()
	{
		$rules = $this->user_m->change_password_rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			//pobranie loginu z sesji
			$login = $this->session->userdata('login');
			//pobranie id usera
			$id_user = $this->user_m->get_id_from_login($login);
			//stare i nowe haslo
			$old_pw = $this->user_m->get_password($login);
			$new_pw = md5($this->input->post('new_password'));
			//generowanie i zapis klucza
			$key = md5(uniqid());
			//zapis do db
			$data = array(
				'user_id' => $id_user,
				'login' => $login,
				'old_pw' => $old_pw,
				'new_pw' => $new_pw,
				'key_pw' => $key,
			);

			//wyslanie emaila
			$email = $this->user_m->get_email_remind($this->session->userdata('login'));
			$this->email->from('wipekxxx@gmail.com', 'Krzysiek');
    		$this->email->to($email);
    		$this->email->subject("Zmiana hasła");
    		$message = '<p>Aby potwierdzić zmianę hasła kliknij w poniższy link, jeżeli natomiast nie zmieniałeś hasła, zignoruj tego emaila.</p>';
    		$message .= "<p><a href='".base_url()."user/change_pw/$id_user/$key'>Kliknij tutaj</a> aby potwierdzić zmianę hasła.</p>";

    		$this->email->message($message);

    		if($this->email->send())
    		{
    			if($this->user_m->save_change_pw($data))
    			{
    				$this->data['subview'] = 'user/email_send';
					$this->load->view('include/header', $this->data);
		            $this->load->view('_m_layout', $this->data);
		            $this->load->view('include/footer', $this->data);
    			}
    			else
    			{
    				$this->data['subview'] = 'user/email_send_failed';
					$this->load->view('include/header', $this->data);
		            $this->load->view('_m_layout', $this->data);
		            $this->load->view('include/footer', $this->data);
    			}
    		}
    		else
    		{
    			$this->data['subview'] = 'user/sth_wrong';
				$this->load->view('include/header', $this->data);
	            $this->load->view('_m_layout', $this->data);
	            $this->load->view('include/footer', $this->data);
    		}
		}
		else
		{
			$this->data['subview'] = 'user/valid_err';
			$this->load->view('include/header', $this->data);
	        $this->load->view('_m_layout', $this->data);
	        $this->load->view('include/footer', $this->data);
		}
	}

	public function change_pw($user_id,$key)
	{
		if($this->user_m->is_valid_data($user_id,$key))
		{
			//wez new_pw
			$new_pw = $this->user_m->get_new_pw($user_id,$key);
			//zapisz nowe haslo do users
			if($this->user_m->save_new_pw_to_users($user_id,$new_pw))
			{
				$this->logout();
				$this->data['subview'] = 'user/u_canl';
				$this->load->view('include/header', $this->data);
	            $this->load->view('_m_layout', $this->data);
	            $this->load->view('include/footer', $this->data);
			}
			else
			{
				$this->data['subview'] = 'user/sth_wrong';
				$this->load->view('include/header', $this->data);
	            $this->load->view('_m_layout', $this->data);
	            $this->load->view('include/footer', $this->data);
			}
		}	
		else
		{
			$this->data['subview'] = 'user/bad_key';
			$this->load->view('include/header', $this->data);
            $this->load->view('_m_layout', $this->data);
            $this->load->view('include/footer', $this->data);
		}
	}
	/* zmiana hasła koniec */

	/*zmiana kodu */

	public function change_delcode()
	{
		$rules = $this->user_m->change_del_code_rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === true)
		{
			//pobranie loginu z sesji
			$login = $this->session->userdata('login');
			//pobranie id usera
			$id_user = $this->user_m->get_id_from_login($login);
			//stary i nowy kod
			$old_del_code = $this->user_m->get_del_code($login);
			$new_del_code = $this->input->post('new_del_code');
			//generowanie i zapis klucza
			$key = md5(uniqid());
			//zapis do db
			$data = array(
				'user_id' => $id_user,
				'login' => $login,
				'old_del_code' => $old_del_code,
				'new_del_code' => $new_del_code,
				'key_del_code' => $key,
			);

			//wyslanie emaila
			$email = $this->user_m->get_email_remind($this->session->userdata('login'));
			$this->email->from('wipekxxx@gmail.com', 'Krzysiek');
    		$this->email->to($email);
    		$this->email->subject("Zmiana kodu");
    		$message = '<p>Aby potwierdzić zmianę kodu kliknij w poniższy link, jeżeli natomiast nie zmieniałeś hasła, zignoruj tego emaila.</p>';
    		$message .= "<p><a href='".base_url()."user/change_del_code/$id_user/$key'>Kliknij tutaj</a> aby potwierdzić zmianę kodu.</p>";

    		$this->email->message($message);

    		if($this->email->send())
    		{
    			if($this->user_m->save_change_delcode($data))
    			{
    				$this->data['subview'] = 'user/all_ok';
					$this->load->view('include/header', $this->data);
					$this->load->view('_m_layout', $this->data);
					$this->load->view('include/footer', $this->data);
    			}
    			else
    			{
    				$this->data['subview'] = 'user/sth_wrong';
					$this->load->view('include/header', $this->data);
					$this->load->view('_m_layout', $this->data);
					$this->load->view('include/footer', $this->data);
    			}
    		}
		}
		else
		{
			$this->data['subview'] = 'user/valid_err';
			$this->load->view('include/header', $this->data);
	        $this->load->view('_m_layout', $this->data);
	        $this->load->view('include/footer', $this->data);
		}
	}

	public function change_del_code($user_id,$key)
	{
		if($this->user_m->is_valid_data_c($user_id,$key))
		{
			//wez new_pw
			$new_del_code = $this->user_m->get_new_del_code($user_id,$key);
			//zapisz nowe haslo do users
			if($this->user_m->save_new_del_code_to_users($user_id,$new_del_code))
			{
				$this->data['subview'] = 'user/all_ok';
				$this->load->view('include/header', $this->data);
		        $this->load->view('_m_layout', $this->data);
		        $this->load->view('include/footer', $this->data);
			}
			else
			{
				$this->data['subview'] = 'user/sth_wrong';
				$this->load->view('include/header', $this->data);
		        $this->load->view('_m_layout', $this->data);
		        $this->load->view('include/footer', $this->data);
			}
		}	
		else
		{
			$this->data['subview'] = 'user/bad_key';
			$this->load->view('include/header', $this->data);
		    $this->load->view('_m_layout', $this->data);
		    $this->load->view('include/footer', $this->data);
		}
	}

	/*zmiana kodu koniec */

	/*zmiana email*/

	public function change_email()
	{
		$rules = $this->user_m->change_email_rules;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() === TRUE)
		{
			//pobranie loginu z sesji
			$login = $this->session->userdata('login');
			//pobranie id usera
			$id_user = $this->user_m->get_id_from_login($login);
			//stary i nowy kod
			$old_email = $this->user_m->get_email_remind($login);
			$new_email = $this->input->post('new_email');
			//generowanie i zapis klucza
			$key = md5(uniqid());
			//zapis do db
			$data = array(
				'user_id' => $id_user,
				'login' => $login,
				'old_email' => $old_email,
				'new_email' => $new_email,
				'key_email' => $key,
				'last_change' => $this->user_m->get_last_email_change($this->input->post('email'),$this->session->userdata('login')),
			);

			//wyslanie emaila
			$email = $this->user_m->get_email_remind($this->session->userdata('login'));
			$this->email->from('wipekxxx@gmail.com', 'Krzysiek');
    		$this->email->to($email);
    		$this->email->subject("Zmiana email");
    		$message = '<p>Aby potwierdzić zmianę emaila kliknij w poniższy link, jeżeli natomiast nie zmieniałeś emaila, zignoruj tą wiadomość.</p>';
    		$message .= "<p><a href='".base_url()."user/change_newemail/$id_user/$key'>Kliknij tutaj</a> aby potwierdzić zmianę emaila.</p>";

    		$this->email->message($message);

    		if($this->email->send())
    		{
    			if($this->user_m->save_change_email($data))
    			{
    				$this->data['subview'] = 'user/email_send';
					$this->load->view('include/header', $this->data);
			        $this->load->view('_m_layout', $this->data);
			        $this->load->view('include/footer', $this->data);
    			}
    			else
    			{
    				$this->data['subview'] = 'user/email_send_failed';
					$this->load->view('include/header', $this->data);
			        $this->load->view('_m_layout', $this->data);
			        $this->load->view('include/footer', $this->data);
    			}
    		}
		}
		else
		{
			$this->data['subview'] = 'user/valid_err';
			$this->load->view('include/header', $this->data);
			$this->load->view('_m_layout', $this->data);
			$this->load->view('include/footer', $this->data);
		}
	}

	public function change_newemail($user_id,$key)
	{
		if($this->user_m->is_valid_data_email($user_id,$key))
		{
			//wez new_pw
			$new_email = $this->user_m->get_new_email($user_id,$key);
			//zapisz nowe haslo do users
			if($this->user_m->save_new_email_to_users($user_id,$new_email))
			{
				$now = date('Y-m-d H:i:s');
				if($this->user_m->update_last_change($now, $user_id) === TRUE)
				{
					$this->email->from('wipekxxx@gmail.com', 'Krzysiek');
		    		$this->email->to($new_email);
		    		$this->email->subject("Zmiana email");
		    		$message = '<p>Email zmnieniony pomyślnie.</p>';
		    		$message .= "<p><a href='".base_url()."user/login'>Kliknij tutaj</a> aby się zalogować.</p>";

		    		if($this->email->send())
		    		{
						$this->data['subview'] = 'user/email_send';
						$this->load->view('include/header', $this->data);
				        $this->load->view('_m_layout', $this->data);
				        $this->load->view('include/footer', $this->data);
		    		}
				}
			}
			else
			{
				$this->data['subview'] = 'user/sth_wrong';
				$this->load->view('include/header', $this->data);
				$this->load->view('_m_layout', $this->data);
				$this->load->view('include/footer', $this->data);
			}
		}	
		else
		{
			$this->data['subview'] = 'user/bad_key';
			$this->load->view('include/header', $this->data);
			$this->load->view('_m_layout', $this->data);
			$this->load->view('include/footer', $this->data);
		}
	}

	/*zmiana email koniec*/

	/* callback'i walidacji */

	public function _pass_password ($str)
	{
		//pobranie hasła z db
		$old_pass_db = $this->user_m->get_password($this->session->userdata('login'));  
		//sprawdzenie czy stare hasło wpisane w formularzu jest identyczne z hasłem z db
		$pass_from_input = md5($this->input->post('old_password'));

		if($old_pass_db === $pass_from_input)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('_pass_password', '%s musi być twoim starym hasłem');
			return false;
		}
	}

	public function _pass_delcode ($str)
	{
		//pobranie kodu z db
		$old_del_code = $this->user_m->get_del_code($this->session->userdata('login'));  
		//sprawdzenie czy stare hasło wpisane w formularzu jest identyczne z hasłem z db
		$del_code_from_input = $this->input->post('old_del_code');

		if($old_del_code === $del_code_from_input)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('_pass_delcode', '%s musi być twoim starym kodem');
			return false;
		}
	}

	//callback sprawdzania czy zgodny email
	public function _pass_email ($str)
	{
		//pobranie kodu z db
		$old_email = $this->user_m->get_email_remind($this->session->userdata('login'));  
		//sprawdzenie czy stare hasło wpisane w formularzu jest identyczne z hasłem z db
		$email_from_input = $this->input->post('old_email');

		if($old_email === $email_from_input)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('_pass_email', '%s musi być twoim starym emailem.');
			return false;
		}
	}
	//calback sprawdzania ostatniej zmiany
	public function _last_email_change ($str)
	{
		//sprawdzic czy uzytkownik cos zmienial
		if($this->user_m->are_user_change_sth($this->session->userdata('login')) === true)
		{
			//pobranie kodu z db
			$last_change = $this->user_m->get_last_email_change($this->session->userdata('login'));  

			$now = date('Y-m-d H:i:s');
			$day_ago = strtotime(date("Y-m-d H:i:s", strtotime($now)) . " -1 day");
			$yesterday = date('Y-m-d H:i:s', $day_ago);

			//jesli data ostatniej zmiany jest mniejsza niz jednen dzień wstecz
			if($last_change < $yesterday)
			{
				return true;
			}
			else
			{
				$this->form_validation->set_message('_last_email_change', 'Email może być zmieniony raz na 24 godziny.');
				return false;
			}
			
		}
		else
		{
			return true;
		}
	}
	//zmiana emaila
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */