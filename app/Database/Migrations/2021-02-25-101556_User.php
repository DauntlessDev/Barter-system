<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

// https://www.codeigniter.com/user_guide/dbmgmt/index.html
class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id'				=> [
				'type'           	=> 'INT',
				'constraint'     	=> 10,
				'unsigned'       	=> true,
				'auto_increment' 	=> true,
			],
			'username'       	 	=> [
				'type'       	 	=> 'VARCHAR',
				'constraint' 	 	=> '250',
			],
			'password'      	 	=> [
				'type'       	 	=> 'VARCHAR',
				'constraint' 	 	=> '255',
			],
			'first_name'       	 	=> [
				'type'       	 	=> 'VARCHAR',
				'constraint' 	 	=> '250',
			],
			'last_name'       	 	=> [
				'type'       	 	=> 'VARCHAR',
				'constraint' 	 	=> '250',
			],
			'address'       	 	=> [
				'type'       	 	=> 'VARCHAR',
				'constraint' 	 	=> '255',
			],
			'contact_details'       => [
				'type'       	 	=> 'VARCHAR',
				'constraint' 	 	=> '255',
				'null'				=> true,
			],
			'photo_url'             => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'default'           => '#',     /* Please set default photo file */
			],
			'item_post_count'       => [
                'type'              => 'INT',
                'constraint'        => '150',
                'default'           => '0',
			],
			'rating'                => [
                'type'              => 'DECIMAL',
                'constraint'        => '2,2',
                'default'           => '0.0',
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
		]);

		$this->forge->addPrimaryKey('user_id');
		$this->forge->addUniqueKey('username');
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
