<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Tempusers extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			),
			'login' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'unique' => TRUE,
				'null' => FALSE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => FALSE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => TRUE,
				'null' => FALSE
			),
			'del_code' => array(
				'type' => 'INT',
				'constraint' => 8,
				'unique' => FALSE,
				'null' => FALSE
			),
			'create_date' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'last_login' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'key' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => FALSE,
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('tempusers');
	}

	public function down() {
		$this->dbforge->drop_table('tempusers');
	}

}

/* End of file 002_tempusers.php */
/* Location: ./application/migrations/002_tempusers.php */