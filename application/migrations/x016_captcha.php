<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Captcha extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'captcha_id' => array(
				'type' => 'BIGINT',
				'constraint' => 13,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
				'null' => FALSE
			),
			'captcha_time' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'null' => FALSE
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => 16,
				'default' => 0,
				'null' => FALSE
			),
			'word' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => FALSE
			)
		));	
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('captcha');
	}

	public function down() {
		$this->dbforge->drop_table('captcha');
	}

}

//CREATE TABLE captcha (
 //captcha_id bigint(13) unsigned NOT NULL auto_increment,
 //captcha_time int(10) unsigned NOT NULL,
 //ip_address varchar(16) default '0' NOT NULL,
 //word varchar(20) NOT NULL,
 //PRIMARY KEY `captcha_id` (`captcha_id`),
 //KEY `word` (`word`)
//);

/* End of file 004_captcha.php */
/* Location: ./application/migrations/004_captcha.php */