<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_User_browsers extends CI_Migration {

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
			'opera' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'flock' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'chrome' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'internet_explorer' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'shiira' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'firefox' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'chimera' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'phoenix' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'firebird' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'camino' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'netscape' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'omniweb' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'safari' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'mozilla' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'konqueror' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'icab' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'lynx' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'links' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'hotjava' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'amaya' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'ibrowse' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'maxthon' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'ubuntu_web_browser' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'mobile_browser' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'other_browser' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),	
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('user_browsers');
	}

	public function down() {
		$this->dbforge->drop_table('user_browsers');
	}

}

/* End of file 024_user_browsers.php */
/* Location: ./application/migrations/024_user_browsers.php */