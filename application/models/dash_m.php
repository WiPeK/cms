<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Dashboard model
*
* @package		WiPeK CMS
* @author 		Krzysztof Adamczyk - WiPeK wipekxxx@gmail.com
* @copyright	Krzysztof Adamczyk 2015
* @version 		Version 1.0
*/

class Dash_m extends MY_Model {
	protected $_table_name = 'users';
	protected $_order_by = 'id';
	public $rules_admin = array(
		'login' => array(
			'field' => 'login',
			'label' => 'Login',
			'rules' => 'trim|xss_clean|required|callback__unique_login|min_length[3]|max_length[16]|alpha_numeric'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Hasło',
			'rules' => 'trim|xss_clean|required|min_length[4]|max_length[16]|matches[password_c]'
		),
		'password_c' => array(
			'field' => 'password_c',
			'label' => 'Powtórzenie hasła',
			'rules' => 'trim|xss_clean|required|min_length[6]|matches[password]'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|xss_clean|required|callback__unique_email|valid_email'
		),
		'del_code' => array(
			'field' => 'del_code',
			'label' => 'Kod usunięcia',
			'rules' => 'trim|xss_clean|required|numeric'
		),
	);
	public $rules_cmsconfig = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Nazwa',
			'rules' => 'trim|xss_clean|alpha_numeric|min_lenght[3]'	
		),
		'regulamin' => array(
			'field' => 'regulamin',
			'label' => 'Regulamin',
			'rules' => 'trim|xss_clean'	
		),
	);

	public $rules_todaypost = array(
		'todaypost' => array(
			'field' => 'todaypost',
			'label' => 'Post dnia',
			'rules' => 'trim|xss_clean|required'	
		),
	);

	public $rules_fb = array(
		'fb_link' => array(
			'field' => 'fb_link',
			'label' => 'Link fb',
			'rules' => 'trim|prep_url|required'	
		),
	);

	public $rules_about = array(
		'about_service' => array(
			'field' => 'about_service',
			'label' => 'O serwisie',
			'rules' => 'trim|xss_clean|required'	
		),
	);

	public $rules_description = array(
		'description' => array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|xss_clean|required'	
		),
	);

	public $rules_keywords = array(
		'keywords' => array(
			'field' => 'keywords',
			'label' => 'Keywords',
			'rules' => 'trim|xss_clean|required'	
		),
	);

	public function __construct()
	{
		parent::__construct();
		
	}

	public function data_to_dashboard()
	{
		$data['cuser'] = $this->db->count_all('users');
		$data['cpage'] = $this->db->count_all('pages');
		$data['carticle'] = $this->db->count_all('articles');
		
		$query = $this->db->get_where('support',array('status' => 'new'));

		$data['csupport'] = $query->num_rows();
		return $data;
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

	public function get_admin(){
		$admin = new stdClass();
		$admin->id = '';
		$admin->login = '';
		$admin->password = '';
		$admin->email = '';
		$admin->del_code = '';
		$admin->create_date = '';
		$admin->last_login = '';
		$admin->mods = '';
		return $admin;
	}

	public function get_art_todaypost()
	{
		$query = $this->db->query("SELECT id,title FROM articles");

		$array = array(
			0 => 'Brak'
		);
		if (count($query->result())) {
			foreach ($query->result() as $row) {
				$array[$row->id] = $row->title;
			}
		}
		return $array;
	}

	public function get_new_cmsconfig(){
		$cmsconfig = new stdClass();
		$all_cms = $this->get_cmsconfig();
		$cmsconfig->name = $all_cms->name;
		$cmsconfig->regulamin = $all_cms->regulamin;
		$cmsconfig->cmsfavicon = $all_cms->favicon_url;
		$cmsconfig->cmslogo = $all_cms->logo_url;
		$cmsconfig->fb_link = $all_cms->fb_link;
		$cmsconfig->about = $all_cms->about;
		$cmsconfig->today_post = $this->fetch_config_today_post();
		$cmsconfig->description = $all_cms->description;
		$cmsconfig->keywords = $all_cms->keywords;
		return $cmsconfig;
	}

	public function fetch_config_name()
	{
		$query = $this->db->query("SELECT name FROM cmsconfig");
		return $query->row('name');
	}

	public function get_admin_id($login, $amods)
	{
		$query = $this->db->query("SELECT id FROM users where login= '$login' and mods= '$amods'");
		return $query->row('id');
	}
	//

	public function get_cmsconfig()
	{
		$query = $this->db->query("SELECT * FROM cmsconfig");
		return $query->row();
	}

	public function fetch_config_today_post()
	{
		$query = $this->db->query("SELECT today_post FROM cmsconfig");
		$todpost = $query->row('today_post');
		$qry = $this->db->query("SELECT title FROM articles WHERE id = '$todpost'");
		return $qry->row('title');
	}

	

	public function update_cms_name($cmsname)
	{
		$this->db->query("UPDATE cmsconfig SET name = '$cmsname'");
	}
	public function update_cms_regulamin($cmsregulamin)
	{
		$this->db->query("UPDATE cmsconfig SET regulamin = '$cmsregulamin'");
	}

	public function update_today_post($today_post)
	{
		$this->db->query("UPDATE cmsconfig SET today_post = '$today_post'");
	}

	public function update_fblink($fb)
	{
		$this->db->query("UPDATE cmsconfig SET fb_link = '$fb'");
	}

	public function update_about($about)
	{
		$this->db->query("UPDATE cmsconfig SET about = '$about'");
	}

	public function update_description($description)
	{
		$this->db->query("UPDATE cmsconfig SET description = '$description'");
	}

	public function update_keywords($keywords)
	{
		$this->db->query("UPDATE cmsconfig SET keywords = '$keywords'");
	}

	public function save_logo($cmslogo)
	{
		$logo = $cmslogo['logo_url'];
		$this->db->query("UPDATE cmsconfig SET logo_url = '$logo'");
	}

	public function get_tags_data()
	{
		$query = $this->db->query("SELECT tags FROM articles ORDER BY RAND() LIMIT 15");
		$array = array();
		foreach($query->result() as $row)
		{
			$array[] = $row->tags;
		}
		return $array;
	}

	public function get_browser_usage()
	{
		$query = $this->db->query('SELECT chrome,firefox,internet_explorer,safari,opera,mobile_browser FROM user_browsers WHERE id = 1');
		$other = $this->db->query('SELECT sum(flock + shiira + chimera + phoenix + firebird + camino + netscape + omniweb + mozilla + konqueror + icab + lynx + links + hotjava + amaya + ibrowse + maxthon + ubuntu_web_browser + other_browser) as other FROM user_browsers WHERE id =1 ');
		//$brow['Inne'] = $other->row('other');
		$all = (int)$query->row('chrome') + (int)$query->row('firefox') + (int)$query->row('internet_explorer') + (int)$query->row('safari') + (int)$query->row('opera') + (int)$query->row('mobile_browser') + (int)$other->row('other');

		$brow['Chrome'] = round(((int)$query->row('chrome')/$all)*100,1);
		$brow['Firefox'] = round(((int)$query->row('firefox')/$all)*100,1);
		$brow['IE'] = round(((int)$query->row('internet_explorer')/$all)*100,1);
		$brow['Safari'] = round(((int)$query->row('safari')/$all)*100,1);
		$brow['Opera'] = round(((int)$query->row('opera')/$all)*100,1);
		$brow['Mobile'] = round(((int)$query->row('mobile_browser')/$all)*100,1);
		$brow['Inne'] = round(((int)$other->row('other')/$all)*100,1);

		return $brow;
	}

	public function get_system_usage()
	{
		$query = $this->db->query("SELECT windows_8_1,windows_8,windows_7,windows_vista,windows_xp,windows_phone,android,ios,mac_osx,linux,macintosh,debian FROM user_systems WHERE id=1");
		$query_other = $this->db->query("SELECT sum(windows_2003 + windows_2000 + windows_nt_4_0 + windows_nt + windows_98 + windows_95 + unknown_windows + blackberry + power_pc_mac + freebsd + sun_solaris + beos + apachebench + aix + irix + decosf + hp_ux + netbsd + bsdi + openbsd + gnu_linux + unknown_unix + symbian_os + other_system) as other FROM user_systems WHERE id = 1");
	
		$all = (int)$query->row('windows_8_1') + (int)$query->row('windows_8') + (int)$query->row('windows_7') + (int)$query->row('windows_vista') + (int)$query->row('windows_xp') + (int)$query->row('windows_phone') + (int)$query->row('android') + (int)$query->row('ios') + (int)$query->row('mac_osx') + (int)$query->row('linux') + (int)$query->row('macintosh') + (int)$query->row('debian') + (int)$query_other->row('other');

		$usys['Windows 8.1'] = round(((int)$query->row('windows_8_1')/$all)*100,1);
		$usys['Windows 8'] = round(((int)$query->row('windows_8')/$all)*100,1);
		$usys['Windows 7'] = round(((int)$query->row('windows_7')/$all)*100,1);
		$usys['Windows Vista'] = round(((int)$query->row('windows_vista')/$all)*100,1);
		$usys['Windows XP'] = round(((int)$query->row('windows_xp')/$all)*100,1);
		$usys['Windows Phone'] = round(((int)$query->row('windows_phone')/$all)*100,1);
		$usys['Android'] = round(((int)$query->row('android')/$all)*100,1);
		$usys['iOS'] = round(((int)$query->row('ios')/$all)*100,1);
		$usys['mac_osx'] = round(((int)$query->row('mac_osx')/$all)*100,1);
		$usys['linux'] = round(((int)$query->row('linux')/$all)*100,1);
		$usys['macintosh'] = round(((int)$query->row('macintosh')/$all)*100,1);
		$usys['debian'] = round(((int)$query->row('debian')/$all)*100,1);
		$usys['Inne'] = round(((int)$query_other->row('other')/$all)*100,1);

		return $usys;
	}

	public function get_browsers()
	{
		$query = $this->db->query("SELECT * FROM user_browsers");
		return $query->result();
	}
}

/* End of file dash_m.php */
/* Location: ./application/models/dash_m.php */