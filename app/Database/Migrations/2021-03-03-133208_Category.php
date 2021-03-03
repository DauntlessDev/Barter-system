<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
	public function up()
	{
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
	}

	public function down()
	{
		$this->forge->dropTable('category');
	}
}
