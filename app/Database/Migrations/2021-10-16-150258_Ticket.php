<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ticket extends Migration
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
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'category_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
            'message' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
            'status' => [
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
		$this->forge->createTable('ticket');
    }

    public function down()
    {
        $this->forge->dropTable('ticket');
    }
}
