<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Users extends CI_Migration {

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
			'mods' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				'null' => FALSE
			),
			'remind_key' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE,
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}

}

/* End of file 003_users.php */
/* Location: ./application/migrations/003_users.php */