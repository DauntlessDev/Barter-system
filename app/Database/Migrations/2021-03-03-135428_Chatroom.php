<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chatroom extends Migration
{
	public function up()
	{

		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
            'chatroom_id'          	=> [
                'type'              => 'INT',
                'constraint'        => 10,
				'unsigned'          => true,
				'auto_increment'    => true,
            ],
            'user1_uid'          	=> [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
			],
			'user2_uid'          	=> [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
			],
			'last_msg_id'          	=> [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
			],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

		/* Creation of Composite PKs */

		// set as foreign keys
		$this->forge->addForeignKey('user1_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('user2_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('last_msg_id', 'messages', 'msg_id', 'CASCADE', 'CASCADE');
		
		// set as primary keys
		$this->forge->addPrimaryKey('chatroom_id');
		$this->forge->addPrimaryKey('user1_uid');
		$this->forge->addPrimaryKey('user2_uid');

		$this->forge->createTable('chat_room');
		
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->db->disableForeignKeyChecks();
        $this->forge->dropTable('chat_room');
        $this->db->enableForeignKeyChecks();
	}
}
