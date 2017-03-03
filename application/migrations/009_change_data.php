<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Change_data extends CI_Migration {

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
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'null' => TRUE,
			),
			'login' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'unique' => TRUE,
				'null' => TRUE
			),
			'old_pw' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			'new_pw' => array(
				'type' => 'VARCHAR',
				'constraint' => 128,
				'null' => TRUE
			),
			'key_pw' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE,
			),
			'old_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => TRUE,
				'null' => TRUE
			),
			'new_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => TRUE,
				'null' => TRUE
			),
			'last_change' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'key_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE,
			),
			'old_del_code' => array(
				'type' => 'INT',
				'constraint' => 8,
				'null' => TRUE
			),
			'new_del_code' => array(
				'type' => 'INT',
				'constraint' => 8,
				'null' => TRUE
			),
			'key_del_code' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE,
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('change_data');
	}

	public function down() {
		$this->dbforge->drop_table('change_data');
	}

}

/* End of file 012_change_data.php */
/* Location: ./application/migrations/012_change_data.php */