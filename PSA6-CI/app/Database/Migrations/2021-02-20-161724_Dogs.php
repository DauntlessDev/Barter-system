<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dogs extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		 => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'd_name'       	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '100',
			],
			'd_breed'      	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '100',
			],
			'd_age'        	 	 => [
				'type'       	 => 'INT',
				'constraint' 	 => 3,
				'unsigned'   	 => true,
			],
			'd_add'        	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '100',
			],
			'd_color'      	 	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '100',
			],
			'd_height'       	 => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '100',
			],
			'd_weight'       	 => [
				'type'       	 => 'DOUBLE',
			],
		]);

		$this->forge->addPrimaryKey('id');

		$this->forge->createTable('dogs');
	}

	public function down()
	{
		$this->forge->dropTable('dogs');
	}
}
