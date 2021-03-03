<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reviews extends Migration
{
	public function up()
	{

        $this->db->disableForeignKeyChecks();

		$this->forge->addField([
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
                'type'              => 'DECIMAL',
                'constraint'        => '2,2',
                'default'           => '0.0',
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

		// set as foreign keys
		$this->forge->addForeignKey('reviewer_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('reviewee_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
		
		// set as primary keys
		$this->forge->addPrimaryKey('reviewer_uid');
		$this->forge->addPrimaryKey('reviewee_uid');

        $this->forge->createTable('reviews');

        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('reviews');
	}
}
