<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Messages extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
            'msg_id'          		=> [
                'type'              => 'INT',
                'constraint'        => 10,
				'unsigned'          => true,
				'auto_increment'    => true,
            ],
			'sender_uid'          	=> [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
			],
			'recipient_uid'         => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
			],
			'content'               => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);

		/* Creation of Composite PKs */

		// set as foreign keys
		$this->forge->addForeignKey('sender_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('recipient_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		
		// set as primary keys
		$this->forge->addPrimaryKey('msg_id');

		$this->forge->createTable('messages');
		
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->db->disableForeignKeyChecks();
        $this->forge->dropTable('messages');
        $this->db->enableForeignKeyChecks();
	}
}
