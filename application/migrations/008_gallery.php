<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Gallery extends CI_Migration {

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
			'img_title' => array(
				'type' => 'VARCHAR',
				'constraint' => 105,
				'null' => FALSE
			),
			'img_describe' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'img_who_add' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => FALSE
			),
			'add_date' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'img_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => FALSE
			),
			'thumb_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => FALSE
			),
			'catalog' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => TRUE
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('gallery');
	}

	public function down() {
		$this->dbforge->drop_table('gallery');
	}

}

/* End of file 009_gallery.php */
/* Location: ./application/migrations/009_gallery.php */