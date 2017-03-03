<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Frontend Controller
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Frontend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//load stuff
		$this->load->model('user_statistic_m');
		$this->load->model('page_m');
		$this->load->model('article_m');
		$this->load->model('user_m');
		$this->load->model('gallery_m');
		$this->load->helper('cms_helper');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('dash_m');
		$this->load->library('user_agent');
		$this->load->driver('cache', array('adapter' => 'file'));

		//navigation
		$cacheMENU = 'cacheMENU';
		if (!$this->data['menu'] = $this->cache->get($cacheMENU))
		{
			$this->data['menu'] = $this->page_m->get_nested();
			$this->cache->save($cacheMENU, $this->data['menu'],600);
		}

		$this->data['id_profil'] = $this->user_m->get_id_from_login($this->session->userdata('login'));
		if($this->user_m->loggedin() === true)
		{
			$this->data['user_data'] = $this->user_m->get_data_user($this->data['id_profil']);
		}

		$cacheNART = 'cacheNART';
		if (!$this->data['newest_arts'] = $this->cache->get($cacheNART)) 
		{
			$this->data['newest_arts'] = $this->article_m->newest_art();
			$this->cache->save($cacheNART, $this->data['newest_arts'],300);
		}

		$cachePOP = 'cachePOP';
		if (!$this->data['popular_arts'] = $this->cache->get($cachePOP)) {
			$this->data['popular_arts'] = $this->article_m->popular_art();
			$this->cache->save($cachePOP, $this->data['popular_arts'],300);
		}

		$this->data['random_arts'] = $this->article_m->random_art();
		$this->data['fimages'] = $this->gallery_m->get_images_footer();
		
		$cacheMPAGES = 'cacheMPAGES';
		if (!$this->data['main_pages'] = $this->cache->get($cacheMPAGES)) {
			$this->data['main_pages'] = $this->page_m->get_pages_to_home();
			$this->cache->save($cacheMPAGES, $this->data['main_pages'],600);
		}

		$cacheTAGS = 'cacheTAGS';
		if (!$this->data['tags_data'] = $this->cache->get($cacheTAGS)) {
			$this->data['tags_data'] = $this->dash_m->get_tags_data();
			$this->cache->save($cacheTAGS, $this->data['tags_data'],200);
		}
		//cmsconfig
		$cacheCMSCFG = 'cacheCMSCFG';
		if (!$this->data['cmscfg'] = $this->cache->get($cacheCMSCFG)) {
			$this->data['cmscfg'] = $this->dash_m->get_cmsconfig();
			$this->cache->save($cacheCMSCFG, $this->data['cmscfg'],3600);
		}

		$this->data['site_name'] = $this->data['cmscfg']->name;

		$cachePOAD = 'cachePOAD';
		if (!$this->data['post_oad'] = $this->cache->get($cachePOAD)) {
			$this->data['post_oad'] = $this->article_m->post_of_a_day($this->data['cmscfg']->today_post);
			$this->cache->save($cachePOAD, $this->data['post_oad'],12000);	
		}
		$this->data['logo'] = $this->data['cmscfg']->logo_url;
		$this->data['meta_title'] = $this->data['cmscfg']->name;

		$this->get_user_agent();
	}

	public function index()
	{
		
	}

	public function get_user_agent()
	{
		if($this->agent->is_mobile())
		{
			$data_platform = $this->agent->platform();
			$data_browser = 'Mobile Browser';
			$this->user_statistic_m->user_platform($data_platform);
			$this->user_statistic_m->user_browser($data_browser);
		}
		elseif($this->agent->is_robot())
		{
			$data_robot = $this->agent->robot();
			$this->user_statistic_m->robot_visit($data_robot);
		}
		elseif($this->agent->is_browser())
		{
			$data_browser = $this->agent->browser();
			$data_platform = $this->agent->platform();
			$this->user_statistic_m->user_platform($data_platform);
			$this->user_statistic_m->user_browser($data_browser);
		}
	}

	// private function ip_visitor_country()
	// {

	//     $client  = @$_SERVER['HTTP_CLIENT_IP'];
	//     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	//     $remote  = $_SERVER['REMOTE_ADDR'];
	//     $country  = "Unknown";

	//     if(filter_var($client, FILTER_VALIDATE_IP))
	//     {
	//         $ip = $client;
	//     }
	//     elseif(filter_var($forward, FILTER_VALIDATE_IP))
	//     {
	//         $ip = $forward;
	//     }
	//     else
	//     {
	//         $ip = $remote;
	//     }
	//     $ch = curl_init();
	//     curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
	//     curl_setopt($ch, CURLOPT_HEADER, 0);
	//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	//     $ip_data_in = curl_exec($ch); // string
	//     curl_close($ch);

	//     $ip_data = json_decode($ip_data_in,true);
	//     $ip_data = str_replace('&quot;', '"', $ip_data);

	//     if($ip_data && $ip_data['geoplugin_countryName'] != null) {
	//         $country = $ip_data['geoplugin_countryName'];
	//     }

	//     return 'IP: '.$ip.' # Country: '.$country;
	// }

}

/* End of file Frontend_Controller.php */
/* Location: ./application/controllers/Frontend_Controller.php */