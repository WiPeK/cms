<?php
class Migration_Create_pages extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '105',
			),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '105',
			),
			'order' => array(
				'type' => 'INT',
				'constraint' => '11',
				'default' => '0',
			),
			'body' => array(
				'type' => 'TEXT',
			),
			'parent_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'default' => 0
			),
			'template' => array(
				'type' => 'VARCHAR',
				'constraint' => '25',
			),
			'views' => array(
				'type' => 'INT',
				'constraint' => 11,
				'default' => 0
			),
			'logo' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => TRUE,
				'default' => '',
			),
			'pageadress' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'inc_def' => array(
				'type' => 'INT',
				'constraint' => 1,
				'default' => 1
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('pages');
	}

	public function down()
	{
		$this->dbforge->drop_table('pages');
	}
}