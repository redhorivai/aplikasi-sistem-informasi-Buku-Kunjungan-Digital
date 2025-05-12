<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
	protected $table      = 'ruangan';
	protected $primaryKey = 'id';
	protected $allowedFields = ['id', 'kode_ruangan', 'nama_ruangan', 'keterangan', 'status_cd', 'created_user', 'created_dttm', 'updated_user', 'updated_dttm', 'nullified_user', 'nullified_dttm'];

	public function getRuangan()
	{
		$query = $this->db->table('ruangan');
		$query->select('*');
		$query->where('status_cd', 'normal');
		$query->orderBy('id', 'DESC');
		$return = $query->get();
		return $return->getResult();
	}

	public function updateData($id, $data)
	{
		$cek = $this->cekKodeRuangan($data['kode_ruangan']);
		if (count($cek) > 1) {
			$ret = false;
		} else {
			$query = $this->db->table('ruangan');
			$query->where('id', $id);
			$query->set($data);
			$ret = $query->update();
		}
		return $ret;
	}

	public function deleteSoft($id, $data)
	{
		$query = $this->db->table('ruangan');
		$query->where('id', $id);
		$query->set($data);
		return $query->update();
	}

	public function cekKodeRuangan($kode_ruangan)
	{
		$query = $this->db->table('ruangan');
		$query->select('*');
		$query->where('kode_ruangan', $kode_ruangan);
		$query->where('status_cd', 'normal');
		$return = $query->get();
		return $return->getResult();
	}

	public function insertData($data)
	{
		$cek = $this->cekKodeRuangan($data['kode_ruangan']);
		if (count($cek) > 0) {
			$ret =  false;
		} else {
			$query = $this->db->table('ruangan');
			$ret =  $query->insert($data);
		}
		return $ret;
	}

	public function get_id($id)
	{
		$query = $this->db->table('ruangan');
		$query->select('*');
		$query->where('id', $id);
		$query->where('status_cd', 'normal');
		return $query->get();
	}
}
