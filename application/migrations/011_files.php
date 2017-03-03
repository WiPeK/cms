<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Files extends CI_Migration {

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
			'file_title' => array(
				'type' => 'VARCHAR',
				'constraint' => 105,
				'null' => FALSE
			),
			'file_who_add' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE
			),
			'add_date' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'file_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => FALSE
			),
			'extension' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => ''
			),
			'raw_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'NULL' => TRUE
			),
			'file_size' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
				'NULL' => TRUE
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('files');
	}

	public function down() {
		$this->dbforge->drop_table('files');
	}

}

/* End of file 020_files.php */
/* Location: ./application/migrations/020_files.php */