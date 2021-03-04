<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
	public function up()
	{
        $this->db->disableForeignKeyChecks();

		$this->forge->addField([
            'category_id'           => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'category_name'         => [
                'type'              => 'ENUM',
				'constraint'        => ['hardware', 'fashion', 'unknown'], //To restrict only known categories 
				'default'			=> 'unknown'
			],
        ]);

        $this->forge->addPrimaryKey('category_id');
        $this->forge->createTable('category');

        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('category');
        $this->db->enableForeignKeyChecks();
	}
}
