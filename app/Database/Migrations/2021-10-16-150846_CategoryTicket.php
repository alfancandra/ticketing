<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryTicket extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'category'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
            'status'       => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('category_ticket');
    }

    public function down()
    {
        $this->forge->dropTable('category_ticket');
    }
}
