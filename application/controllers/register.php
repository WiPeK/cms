<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Register Controller
*
* @package      WiPeK CMS
* @author       Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright    Krzysztof Adamczyk 2015
* @version      Version 1.0
*/

class Register extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->model('register_m');
	}

	public function index()
	{
        $this->data['regulamin'] = $this->register_m->fetch_regulamin();
        $this->data['subview'] = 'regulamin';
        $this->load->view('include/header', $this->data);
        $this->load->view('_m_layout', $this->data);
        $this->load->view('include/footer', $this->data);
    }

    public function user()
    {
        
        // //redirect if login
        if($this->user_m->loggedin() == TRUE && $this->session->userdata('mods') === 'admin')
        {
            redirect('admin/dashboard');
        }
        elseif($this->user_m->loggedin() == TRUE && $this->session->userdata('mods') === 'user')
        {
            redirect('user/members');
        }
        
    	$rules = $this->register_m->rules;
    	$this->form_validation->set_rules($rules);

    	//polskie errory do formularzy
    	$this->form_validation->set_message('required', '%s jest wymagane/y!');
    	$this->form_validation->set_message('is_unique', '%s jest już w użyciu!');
    	$this->form_validation->set_message('min_length', 'Za mało znaków!');
    	$this->form_validation->set_message('max_length', 'Za dużo znaków!');
    	$this->form_validation->set_message('numeric', 'Pole może zawierać tylko cyfry!');
    	$this->form_validation->set_message('match_captcha', 'Przepisz poprawnie kod captcha!');
    	$this->form_validation->set_message('matches', 'Pola %s i %s muszą się zgadzać!');
    	$this->form_validation->set_message('alpha_numeric', '%s może zawierać tylko litery i liczby!');
    	$this->form_validation->set_message('valid_email', $this->input->post('email').' nie jest prawidłowym adresem email!');

    	if($this->form_validation->run() === false)
    	{	
			$this->data['image'] = $this->register_m->create_image();

            $this->data['subview'] = 'register';
	    	$this->load->view('include/header', $this->data);
            $this->load->view('_m_layout', $this->data);
            $this->load->view('include/footer', $this->data);
		}
    	else
    	{
    		//generowanie losowego klucza
    		$key = md5(uniqid());

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

    		$this->email->from('wipekxxx@gmail.com', 'Krzysiek');
    		$this->email->to($this->input->post('email'));
    		$this->email->subject("Potwierdzenie rejestracji");
    		$message = '<p>Dziękujemy za rejestrację</p>';
    		$message .= "<p><a href='".base_url()."register/register_user/$key'>Kliknij tutaj</a> aby potwierdzić rejestracje</p>";

    		$this->email->message($message);

    		if ($this->register_m->add_temp_user($key))
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

	public function register_user($key)
	{
		if ($this->register_m->is_key_valid($key))
		{
			if ($this->register_m->add_user($key))
			{
                $this->data['subview'] = 'user/register_ok';
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

	public function captcha_check($value)
	{
		if ($value == '')
		{
			$this->form_validation->set_message('captcha_check','Przepisz poprawnie kod captcha z obrazka.')
			return false;
		}
		else
		{
			return true;
		}
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */