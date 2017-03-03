<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Articles extends CI_Migration {

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
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'pubdate' => array(
				'type' => 'DATE',
			),
			'body' => array(
				'type' => 'TEXT',
			),
			'created' => array(
				'type' => 'DATETIME',
			),
			'modified' => array(
				'type' => 'DATETIME',
			),
			'created_by' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'modified_by' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'category' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'tags' => array(
				'type' => 'TEXT',
				'constraint' => '255',
			),
			'parent_page' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'positive' => array(
				'type' => 'INT',
				'constraint' => '100',
			),
			'negative' => array(
				'type' => 'INT',
				'constraint' => '100',
			),
			'views' => array(
				'type' => 'INT',
				'constraint' => 11,
				'default' => 0
			),
			'logo' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'default' => ''
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('articles');
	}

	public function down() {
		$this->dbforge->drop_table('articles');
	}

}

/* End of file 007_add_fields_to_article.php */
/* Location: ./application/migrations/007_add_fields_to_article.php */