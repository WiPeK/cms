<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_User_systems extends CI_Migration {

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
			'windows_8_1' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_8' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_7' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_vista' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_2003' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_xp' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_2000' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_nt_4_0' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_nt' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_98' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_95' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'windows_phone' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'unknown_windows' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'android' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'blackberry' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'ios' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'mac_osx' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'power_pc_mac' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'freebsd' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'macintosh' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'linux' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'linux' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'debian' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'sun_solaris' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'beos' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'apachebench' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'aix' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'irix' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'decosf' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'hp_ux' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'netbsd' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'bsdi' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'openbsd' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'gnu_linux' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'unknown_unix' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'symbian_os' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
			'other_system' => array(
				'type' => 'BIGINT',
				'constraint' => 11,
				'default' => 0
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('user_systems');
	}

	public function down() {
		$this->dbforge->drop_table('user_systems');
	}

}

/* End of file 024_user_systems.php */
/* Location: ./application/migrations/024_user_systems.php */