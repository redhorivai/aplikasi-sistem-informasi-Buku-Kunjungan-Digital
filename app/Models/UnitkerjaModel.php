<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitkerjaModel extends Model
{
	protected $table      = 'unit_kerja';
	protected $primaryKey = 'id';
	protected $allowedFields = ['id', 'kode_unit', 'nama_unit', 'alamat', 'status_cd', 'created_user', 'created_dttm', 'updated_user', 'updated_dttm', 'nullified_user', 'nullified_dttm'];

	public function getUnitkerja()
	{
		$query = $this->db->table('unit_kerja');
		$query->select('*');
		$query->where('status_cd', 'normal');
		$query->orderBy('id', 'DESC');
		$return = $query->get();
		return $return->getResult();
	}

	public function updateData($id, $data)
	{
		$cek = $this->cekKodeunit($data['kode_unit']);
		if (count($cek) > 1) {
			$ret = false;
		} else {
			$query = $this->db->table('unit_kerja');
			$query->where('id', $id);
			$query->set($data);
			$ret = $query->update();
		}
		return $ret;
	}

	public function deleteSoft($id, $data)
	{
		$query = $this->db->table('unit_kerja');
		$query->where('id', $id);
		$query->set($data);
		return $query->update();
	}

	public function cekKodeunit($kode_unit)
	{
		$query = $this->db->table('unit_kerja');
		$query->select('*');
		$query->where('kode_unit', $kode_unit);
		$query->where('status_cd', 'normal');
		$return = $query->get();
		return $return->getResult();
	}

	public function insertData($data)
	{
		$cek = $this->cekKodeunit($data['kode_unit']);
		if (count($cek) > 0) {
			$ret =  false;
		} else {
			$query = $this->db->table('unit_kerja');
			$ret =  $query->insert($data);
		}
		return $ret;
	}

	public function get_id($id)
	{
		$query = $this->db->table('unit_kerja');
		$query->select('*');
		$query->where('id', $id);
		$query->where('status_cd', 'normal');
		return $query->get();
	}
}
