<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Home Controller
*
* @package      WiPeK CMS
* @author       Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright    Krzysztof Adamczyk 2015
* @version      Version 1.0
*/

class Home extends Frontend_Controller {

	public function __construct(){
        parent::__construct();
    }

    public function index() {
    	// Fetch the page template
    	$this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
    	count($this->data['page']) || show_404(current_url());
    	add_meta_title($this->data['page']->title);
    	
    	// Fetch the page data
    	$method = '_' . $this->data['page']->template;
    	if (method_exists($this, $method)) {
    		$this->$method();
    	}
    	else {

    		log_message('error', 'Could not load template ' . $method .' in file ' . __FILE__ . ' at line ' . __LINE__);
    		show_error('Could not load template ' . $method);
    	}
    	
    	// Load the view
        if($this->page_m->add_views($this->data['page']->id) === true)
        {
            if($this->data['page']->template == 'news_archive' || $this->data['page']->template == 'page')
            {
                $this->data['subview'] = 'templates/' . $this->data['page']->template;
            }
            elseif($this->data['page']->template == 'static')
            {
                if($this->data['page']->inc_def == 1)
                {
                    $this->load->view('include/header', $this->data);
                    $this->load->view('static/' . $this->data['page']->pageadress, $this->data);
                    $this->load->view('include/footer', $this->data);
                }
                elseif($this->data['page']->inc_def == 0)
                {
                    $this->load->view('static/' . $this->data['page']->pageadress, $this->data);
                    //$this->load->view('static/gallery/gallery_body', $this->data);
                }
            }
            elseif($this->data['page']->template === 'homepage')
            {
                $this->data['home_content'] = 1;
            }
            if($this->data['page']->template != 'static')
            {
                $this->load->view('include/header', $this->data);
                $this->load->view('_m_layout', $this->data);
                $this->load->view('include/footer', $this->data); 
            }
        }
    }

    // public function index() {
    //     // Fetch the page template
    //     $this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
    //     count($this->data['page']) || show_404(current_url());
    //     add_meta_title($this->data['page']->title);
        
    //     // Fetch the page data
    //     $method = '_' . $this->data['page']->template;
    //     if (method_exists($this, $method)) {
    //         $this->$method();
    //     }
    //     else {

    //         log_message('error', 'Could not load template ' . $method .' in file ' . __FILE__ . ' at line ' . __LINE__);
    //         show_error('Could not load template ' . $method);
    //     }
        
    //     // Load the view
    //     if($this->page_m->add_views($this->data['page']->id) === true)
    //     {
    //         $this->data['navbar_user'] = 'navbar_user';
    //         $this->data['subview'] = 'templates/' . $this->data['page']->template;

    //         $this->load->view('include/header', $this->data);
    //         $this->load->view('_main_layout', $this->data);
    //         $this->load->view('include/footer', $this->data); 
    //     }
        
    // }
    
    private function _page(){
    	$this->data['recent_news'] = $this->article_m->get_recent();
    }
    
    private function _static(){

    }

    private function _homepage(){

    }
    
    private function _news_archive(){
    	
    	$this->data['recent_news'] = $this->article_m->get_recent();
    	
		// Count all articles
		$this->article_m->set_published();
		//$count = $this->db->count_all_results('articles');
        $count = $this->article_m->get_to_pagination(str_replace(' ','_',$this->data['page']->title));
        
		// Set up pagination
		$perpage = 10;
		if ($count > $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(2);
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
		
        $page_title = str_replace(' ','_',$this->data['page']->title);
        // Fetch articles
        $this->article_m->set_published();
        $this->db->where('parent_page', $page_title);
        $this->db->limit($perpage, $offset);
        $this->data['articles'] = $this->article_m->get();
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */