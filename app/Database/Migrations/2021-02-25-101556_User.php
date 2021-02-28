<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

// https://www.codeigniter.com/user_guide/dbmgmt/index.html
class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		 => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'username'       	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '250',
			],
			'password'      	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '255',
			],
			'first_name'       	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '250',
			],
			'last_name'       	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '250',
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addUniqueKey('username');

		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
