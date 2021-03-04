<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Itemlisting extends Migration
{
	public function up()
	{

		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'item_id'           	=> [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
            'category_id'           => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
        ]);
		

		/* Creation of Composite PKs */

		// set as foreign keys
		$this->forge->addForeignKey('item_id', 'item', 'item_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('category_id', 'category', 'category_id', 'CASCADE', 'CASCADE');

		// set as primary keys
		$this->forge->addPrimaryKey('item_id');
		$this->forge->addPrimaryKey('category_id');

		$this->forge->createTable('item_listing');
		
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->db->disableForeignKeyChecks();
        $this->forge->dropTable('item_listing');
        $this->db->enableForeignKeyChecks();
	}
}
