<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengunjung extends Migration
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
			'id_unit' 		 => [
				'type'       => 'int',
				'constraint' => 8,
			],
			'id_provinsi' 		 => [
				'type'       => 'int',
				'constraint' => 8,
			],
			'id_kota' 		 => [
				'type'       => 'CHAR',
				'constraint' => '50',
			],
			'nama_pemohon' 		 => [
				'type'       => 'VARHCHAR',
				'constraint' => '255',
			],
			'nama_pemohon' 		 => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nama_instansi'  => [
				'type'       => 'CHAR',
				'constraint' => '100',
			],
			'telepon_pemohon'  => [
				'type'       => 'CHAR',
				'constraint' => '50',
			],
			'email'  => [
				'type'       => 'CHAR',
				'constraint' => '50',
			],
			'alamat'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'tgl_kunjungan'  => [
				'type'       => 'DATETIME',
			],
			'topik'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'jumlah_peserta'  => [
				'type'       => 'CHAR',
				'constraint' => '50',
			],
			'pimpinan_pengunjung'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'keterangan' 		 => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'no_surat'  => [
				'type'       => 'CHAR',
				'constraint' => '100',
			],
			'surat_kepada'  => [
				'type'       => 'CHAR',
				'constraint' => '100',
			],
			'file_surat'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'status' 	 => [
				'type'       => 'ENUM',
				'constraint' => ['proses', 'diterima', 'ditolak'],
			],
			'pesan_status'  => [
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
		$this->forge->createTable('pengunjung');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pengunjung');

	}
}
