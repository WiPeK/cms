<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Cmsconfig extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 2,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE
			),
			'regulamin' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'favicon_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'logo_url' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'fb_link' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'default' => ''
			),
			'about' => array(
				'type' => 'TEXT',
				'null' => TRUE
			),
			'today_post' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'default' => ''
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'default' => ''
			),
			'keywords' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'default' => ''
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('cmsconfig');
	}

	public function down()
	{
		$this->dbforge->drop_table('cmsconfig');
	}

}

/* End of file 006_cmsconfig.php */
/* Location: ./application/migrations/wzór/006_cmsconfig.php */