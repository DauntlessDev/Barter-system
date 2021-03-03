<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Item extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'item_id'               => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'poster_uid'            => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
            'item_name'             => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'default'           => 'Unknown item',
            ],
            'photo_url'             => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'default'           => '#',     /* Please set default photo file */
            ],
            'avail_status'          => [
                'type'              => 'ENUM',
                'constraint'        => ['available', 'pending', 'unavailable'],
                'default'           => 'available',
            ],
            'desc_title'            => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'default'           => 'Add a description title',
            ],
            'desc_content'          => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'rating'                => [
                'type'              => 'DECIMAL',
                'constraint'        => '2,2',
                'default'           => '0.0',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addPrimaryKey('item_id');
        $this->forge->addForeignKey('poster_uid', 'user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('item');

        $this->db->enableForeignKeyChecks();
}

    public function down()
    {
        $this->forge->dropTable('item');
    }
}