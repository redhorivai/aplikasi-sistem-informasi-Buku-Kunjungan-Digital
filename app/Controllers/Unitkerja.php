<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitkerjaModel;


class Unitkerja extends BaseController
{
	protected $m_unitkerja;
	protected $session;

	public function __construct()
	{
		$this->m_unitkerja = new UnitkerjaModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}
	public function index()
	{
		if (session()->get('username') == '') {
            session()->setFlashdata('error', 'Anda belum login! Silahkan login terlebih dahulu');
            return redirect()->to(base_url('/admin'));
        }
		$data = ['title' => 'data unit kerja', 'active' => 'unitkerja'];
		return view('admin/unitkerja/index', $data);
	}

	public function getData()
	{
		$res 	= $this->m_unitkerja->getUnitkerja();
		$nomor	= 1;
		if (count($res) > 0) {
			foreach ($res as $data) {
				$output[] = array(
					'no'		=> $nomor++,
					'col1'		=> "$data->kode_unit",
					'col2'		=> "$data->nama_unit",
					'col3'		=> "$data->alamat",
					'action'	=> "<span><a onclick='_btnEdit(\"$data->id\",\"$data->kode_unit\",\"$data->nama_unit\")'><button type='button' class='btn bg-gradient-info'><i class='nav-icon fas fa-pen'></i> Ubah</button></a></span><span><a  onclick='_btnDelete(\"$data->id\",\"$data->kode_unit\",\"$data->nama_unit\")'><button type='button' class='btn bg-gradient-danger'><i class='nav-icon fas fa-trash'></i> Hapus</button></a></span>",
				);
				$ret = array('data' => $output);
			}
		} else {
			$ret = array('data' => []);
		}
		return $this->response->setJSON($ret);
	}

	public function del_data()
	{
		if ($this->request->isAJAX()) {
			$id		= $this->request->getPost('id');
			$data	= [
				'status_cd'		 => 'nullified',
				'nullified_user' => session()->get('id'),
				'nullified_dttm' => date('Y-m-d H:i:s'),
			];
			$this->m_unitkerja->deleteSoft($id, $data);
			$msg = ['sukses' => 'Data unit kerja telah dihapus.'];
			echo json_encode($msg);
		} else {
			exit('Request Error');
		}
	}

	public function insert_data()
	{
		if ($this->request->isAJAX()) {
			$kode_unit			= strtoupper($this->request->getVar('kode_unit'));
			$nama_unit			= strtoupper($this->request->getVar('nama_unit'));
			$alamat				= strtoupper($this->request->getVar('alamat'));
			$data = [
				'kode_unit'				=> $kode_unit,
				'nama_unit'				=> $nama_unit,
				'alamat'				=> $alamat,
				'created_user'			=> session()->get('id'),
				'created_dttm'			=> date('Y-m-d H:i:s'),
			];
			$insert	= $this->m_unitkerja->insertData($data);
			if ($insert == TRUE) {
				echo json_encode(['status'	=> TRUE]);
			} else {
				echo json_encode(['kode'	=> "Kode Unit: <b class='text-danger'>$kode_unit</b> sudah ada, silahkan coba yang lain."]);
			}
		} else {
			exit('Request Error');
		}
	}

	public function get_edit()
	{
		if ($this->request->isAJAX()) {
			$id		= $this->request->getVar('id');
			$data	= $this->m_unitkerja->get_id($id)->getRowArray();
			echo json_encode($data);
		} else {
			exit('Request Error');
		}
	}

	public function update_data()
	{
		if ($this->request->isAJAX()) {
			$id					= $this->request->getVar('id');
			$kode_unit			= strtoupper($this->request->getVar('kode_unit'));
			$nama_unit			= strtoupper($this->request->getVar('nama_unit'));
			$alamat				= strtoupper($this->request->getVar('alamat'));
			$data = [
				'kode_unit'				=> $kode_unit,
				'nama_unit'				=> $nama_unit,
				'alamat'				=> $alamat,
				'updated_user'			=> session()->get('id'),
				'updated_dttm'			=> date('Y-m-d H:i:s'),
			];
			$insert	= $this->m_unitkerja->updateData($id,$data);
			if ($insert == TRUE) {
				echo json_encode(['status'	=> TRUE]);
			}
		} else {
			exit('Request Error');
		}
	}
}
