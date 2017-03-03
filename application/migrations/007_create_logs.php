<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_logs extends CI_Migration {

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
			'logdate' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'logbody' => array(
				'type' => 'TEXT',
				'null' => FALSE
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('logs');
	}

	public function down() {
		$this->dbforge->drop_table('logs');
	}
}

/* End of file create_logs.php */
/* Location: ./application/migrations/create_logs.php */