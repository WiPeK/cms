<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Support extends CI_Migration {

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
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => FALSE
			),
			'body' => array(
				'type' => 'TEXT',
				'null' => FALSE
			),
			'status' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'default' => 'new',
			),
			'send_date' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'answer_date' => array(
				'type' => 'DATETIME',
				'null' => FALSE,
				'default' => '0',
			),
			'who_answer' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'answer_body' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('support');
	}

	public function down() {
		$this->dbforge->drop_table('support');
	}

}

/* End of file 013_support.php */
/* Location: ./application/migrations/013_support.php */