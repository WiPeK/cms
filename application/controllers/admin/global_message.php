<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Global Message Controller in admin dashboard
*
* @package      WiPeK CMS
* @author       Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright    Krzysztof Adamczyk 2015
* @version      Version 1.0
*/

class global_message extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$rules = $this->user_m->global_message_rules;
    	$this->form_validation->set_rules($rules);

    	if($this->form_validation->run() === false)
    	{	
			$this->data['subview'] = 'admin/global_message/index';
			$this->load->view($this->admin_header, $this->data);
            $this->load->view($this->admin_layout, $this->data);
            $this->load->view($this->admin_footer, $this->data);
		}
    	else
    	{

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

    		$this->email->from('wipekxxx@gmail.com', 'CMS ADMIN');
    		$this->email->to($this->user_m->get_emails()); //naprawione w mt2cms
    		$this->email->subject($this->input->post('subject'));
    		$message = $this->input->post('message_body');

    		$this->email->message($message);

    			if($this->email->send())
    			{
                    $this->logi_m->create_log_send_global_message();
                    $this->data['subview'] = 'admin/global_message/email_send';
                    $this->load->view($this->admin_header, $this->data);
                    $this->load->view($this->admin_layout, $this->data);
                    $this->load->view($this->admin_footer, $this->data);
    			}
    			else
    			{
                    $this->data['subview'] = 'admin/global_message/email_send_failed';
                    $this->load->view($this->admin_header, $this->data);
                    $this->load->view($this->admin_layout, $this->data);
                    $this->load->view($this->admin_footer, $this->data);
				}
    	}

	}

}

/* End of file global_message.php */
/* Location: ./application/controllers/global_message.php */