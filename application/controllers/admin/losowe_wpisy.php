<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Losowe_wpisy extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$capstr = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","w","x","y","z");
		$titl = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","w","x","y","z");
		$abc = 0;
		$xyz = 100;
		while($abc<$xyz)
		{

			$n = 0;
			//tytuł
			$this->data['title'] = '';
			while($n<87)
			{
				$this->data['title'] .=$titl[mt_rand(0, 24)];
				$n++;
			}
			$rok = mt_rand(1990,2014);
			$mies = mt_rand(1,12);
			if($mies<10)
			{
				$mies = 0 . $mies;
			}
			$dzien = mt_rand(1,30);
			if($dzien<10)
			{
				$dzien = 0 . $dzien;
			}
			$this->data['pubdate'] = $rok . '-' . $mies . '-' . $dzien;
			//echo $this->data['pubdate'] . '</br>'; 
			
			//body
			$this->data['body'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium ex, fuga? Eum dolor architecto quos explicabo voluptatum accusamus eos ducimus doloribus amet quam, nihil omnis sed itaque magnam corrupti ratione nostrum fugit dolorum dignissimos quo ab possimus autem aliquid. Ipsam commodi, similique magnam omnis voluptatum esse consequuntur officiis, illum corporis?';
			
			//created
			$rok = mt_rand(1990,2014);
			$mies = mt_rand(1,12);
			if($mies<10)
			{
				$mies = 0 . $mies;
			}
			$dzien = mt_rand(1,30);
			if($dzien<10)
			{
				$dzien = 0 . $dzien;
			}
			$godzina = mt_rand(0,23);
			if($godzina<10)
			{
				$godzina = 0 . $godzina;
			}
			$minuta = mt_rand(0,59);
			if($minuta<10)
			{
				$minuta = 0 . $minuta;
			}
			$sekunda = mt_rand(0,59);
			if($sekunda<10)
			{
				$sekunda = 0 . $sekunda;
			}
			$this->data['created'] = $rok . '-' . $mies . '-' . $dzien . ' ' . $godzina . ':' . $minuta . ':' . $sekunda;
			//echo $this->data['created'] . '</br>';

			//modified
			$rok = mt_rand(1990,2014);
			$mies = mt_rand(1,12);
			if($mies<10)
			{
				$mies = 0 . $mies;
			}
			$dzien = mt_rand(1,30);
			if($dzien<10)
			{
				$dzien = 0 . $dzien;
			}
			$godzina = mt_rand(0,23);
			if($godzina<10)
			{
				$godzina = 0 . $godzina;
			}
			$minuta = mt_rand(0,59);
			if($minuta<10)
			{
				$minuta = 0 . $minuta;
			}
			$sekunda = mt_rand(0,59);
			if($sekunda<10)
			{
				$sekunda = 0 . $sekunda;
			}
			$this->data['modified'] = $rok . '-' . $mies . '-' . $dzien . ' ' . $godzina . ':' . $minuta . ':' . $sekunda;
			//echo $this->data['modified'] . '</br>';

			//created_by
			$this->data['created_by'] = '';
			$n = 0;
			while($n<11)
			{
				$this->data['created_by'] .= $titl[mt_rand(0, 24)];
				$n++;
			}
			//echo $this->data['created_by'] . '</br>';

			//created_by
			$this->data['modified_by'] = '';
			$n = 0;
			while($n<11)
			{
				$this->data['modified_by'] .= $titl[mt_rand(0, 24)];
				$n++;
			}
			//echo $this->data['modified_by'] . '</br>';

			//category
			$this->data['category'] = '';
			$m = mt_rand(1, 3);
			$n = 0;
			$i = 1;
			while($i<=$m)
			{
						while($n<11)
						{
							$this->data['category'] .= $titl[mt_rand(0, 24)];
							$n++;
						}
						$n = 0;
						$this->data['category'] .= ',';
						$i++;
			}
			$this->data['category'] = substr($this->data['category'],0,-1);
			//echo $this->data['category'] . '</br>';

			//tags
			$this->data['tags'] = '';
			$m = mt_rand(1, 3);
			$n = 0;
			$i = 1;
			while($i<=$m)
			{
						while($n<5)
						{
							$this->data['tags'] .= $titl[mt_rand(0, 24)];
							$n++;
						}
						$n = 0;
						$this->data['tags'] .= ',';
						$i++;
			}
			$this->data['tags'] = substr($this->data['tags'],0,-1);
			//echo $this->data['tags'] . '</br>';

			//parent_page
			$pg = array('News_archive','bcxv','nonugd');
			$this->data['parent_page'] = $pg[mt_rand(0,2)];
			//echo $this->data['parent_page'] . '</br>';

			//views
			$this->data['views'] = 0;

			//logo
			$logos = array('images/articles_logos/de1f260b605b98ad1ae71edb83fe3de2.jpg','images/articles_logos/c2c19bac81030cdc333d0abf4583d05e.jpg','images/articles_logos/324b413846e10d677ebf7d01ed5d79d7.jpg','images/articles_logos/Ser.jpg','images/articles_logos/Zimno.jpg','images/articles_logos/6d123d27580800c9e6db55de401e7c46.jpg','images/articles_logos/Testowy.jpg','images/articles_logos/gvdfdfdfd.jpg','images/articles_logos/hgbfvxgfczdx.jpg','images/articles_logos/8f9b636bbff0c4fdbd745f7c531f66d9.jpg');
			$this->data['logo'] = $logos[mt_rand(0,8)];
			//echo $this->data['logo'];
			$data = array(
				'title' => $this->data['title'],
				'pubdate' => $this->data['pubdate'],
				'pubdate' => $this->data['pubdate'],
				'body' => $this->data['body'],
				'created' => $this->data['created'],
				'modified' => $this->data['modified'],
				'created_by' => $this->data['created_by'],
				'modified_by' => $this->data['modified_by'],
				'category' => $this->data['category'],
				'tags' => $this->data['tags'],
				'parent_page' => $this->data['parent_page'],
				'views' => $this->data['views'],
				'logo' => $this->data['logo'],
				'positive' => 0,
				'negative' => 0,
			);
			$this->db->insert('articles',$data);
			$abc++;
		}
	}

}

/* End of file losowe_wpisy.php */
/* Location: ./application/controllers/losowe_wpisy.php */