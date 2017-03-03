<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Article Controller
*
* @package      WiPeK CMS
* @author       Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright    Krzysztof Adamczyk 2015
* @version      Version 1.0
*/

class Article extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->data['recent_news'] = $this->article_m->get_recent();
    }

    public function index($parent_page, $id){
        // Fetch the article
        $this->article_m->set_published();
        $this->data['article'] = $this->article_m->get($id);
        
        // Return 404 if not found
        count($this->data['article']) || show_404(uri_string());
        
        // Redirect if parent_page and id was incorrect
        $requested_parent_page = $this->uri->segment(2);
        $requested_id = $this->uri->segment(3);
        $set_parent_page = $this->data['article']->parent_page;
        $set_id = $this->data['article']->id;

        if ($requested_parent_page != $set_parent_page || $requested_id != $set_id) {
            show_404(uri_string());
            //redirect('article/' . $this->data['article']->parent_page . '/' .  $this->data['article']->id, 'location', '301');
        }
        
        $this->data['similar_articles'] = $this->article_m->get_similar_articles($this->data['article']->title,$this->data['article']->body);

        // Load view
        //licznik
        if($this->article_m->add_views($this->data['article']->id) === true)
        {
            add_meta_title($this->data['article']->title);
            $this->data['subview'] = 'templates/article';
            $this->load->view('include/header', $this->data);
            $this->load->view('_m_layout', $this->data);
            $this->load->view('include/footer', $this->data);  
        }

    }
}

/* End of file article.php */
/* Location: ./application/controllers/article.php */