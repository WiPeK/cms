<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Robots_visit extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			),
			'googlebot' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'msnbot' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'baiduspider' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'bing' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'inktomi_slurp' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'yahoo' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'askjeeves' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'fastcrawler' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'infoseek_robot_1_0' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'lycos' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'yandexbot' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'mediapartners_google' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'crazy_webcrawler' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'adsbot_google' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'feedfetcher_google' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'curious_george' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'other_robot' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('robots_visit');
	}

	public function down() {
		$this->dbforge->drop_table('robots_visit');
	}

}

/* End of file 026_robots_visit.php */
/* Location: ./application/migrations/026_robots_visit.php */