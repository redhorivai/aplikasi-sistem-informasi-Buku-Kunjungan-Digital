<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ruangan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 8,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'kode_ruangan' 		 => [
				'type'       => 'CHAR',
				'constraint' => '50',
			],
			'nama_ruangan' 		 => [
				'type'       => 'CHAR',
				'constraint' => '100',
			],
			'keterangan' 		 => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'status_cd' 	 => [
				'type'       => 'ENUM',
				'constraint' => ['normal', 'nullified'],
				'default'	 => 'normal',
			],
			'created_user'	 => [
				'type'       => 'INT',
				'constraint' => 8,
				'null'		 => true,
			],
			'created_dttm' 	 => [
				'type'       => 'DATETIME',
				'null'		 => true,

			],
			'updated_user'	 => [
				'type'       => 'INT',
				'constraint' => 8,
				'null'		 => true,
			],
			'updated_dttm' 	 => [
				'type'       => 'DATETIME',
				'null'		 => true,
			],
			'nullified_user' => [
				'type'       => 'INT',
				'constraint' => 8,
				'null'		 => true,
			],
			'nullified_dttm'	 => [
				'type'       => 'DATETIME',
				'null'		 => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('ruangan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('ruangan');

	}
}
