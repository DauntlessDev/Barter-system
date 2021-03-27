<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reviews extends Migration
{
	public function up()
	{

        $this->db->disableForeignKeyChecks();

		$this->forge->addField([
            'review_id'             => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'reviewer_uid'          => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
            'reviewee_uid'          => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
			],
			'rating'                => [
                'type'              => 'INT',
                'constraint'        => 10,
                'default'           => '0',
            ],
            'content'               => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

		/* Creation of Composite PKs */

		$this->forge->addPrimaryKey('review_id');
		$this->forge->addForeignKey('reviewer_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('reviewee_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		

        $this->forge->createTable('reviews');

        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->db->disableForeignKeyChecks();
        $this->forge->dropTable('reviews');
        $this->db->enableForeignKeyChecks();
	}
}
