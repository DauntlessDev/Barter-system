<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Offers extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'item_id'               => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
            'poster_uid'            => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
			],
			'customer_uid'          => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
            'offer_msg_title'       => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'default'           => 'Add Offer Title',
            ],
            'offer_msg_content'     => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

		/* Creation of Composite PKs */

		// set as foreign keys
		$this->forge->addForeignKey('item_id', 'item', 'item_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('poster_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('customer_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		
		// set as primary keys
		$this->forge->addPrimaryKey('item_id');
		$this->forge->addPrimaryKey('poster_uid');
		$this->forge->addPrimaryKey('customer_uid');

        $this->forge->createTable('offers');
	}

	public function down()
	{
		$this->forge->dropTable('offers');
	}
}
