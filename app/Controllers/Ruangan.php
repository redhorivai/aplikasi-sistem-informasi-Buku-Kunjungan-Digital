<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RuanganModel;


class Ruangan extends BaseController
{
	protected $m_ruangan;
	protected $session;

	public function __construct()
	{
		$this->m_ruangan = new RuanganModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}
	public function index()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('error', 'Anda belum login! Silahkan login terlebih dahulu');
			return redirect()->to(base_url('/admin'));
		}
		$data = ['title' => 'data ruangan', 'active' => 'ruangan'];
		return view('admin/ruangan/index', $data);
	}

	public function getData()
	{
		$res 	= $this->m_ruangan->getRuangan();
		$nomor	= 1;
		if (count($res) > 0) {
			foreach ($res as $data) {
				$output[] = array(
					'no'		=> $nomor++,
					'col1'		=> "$data->kode_ruangan",
					'col2'		=> "$data->nama_ruangan",
					'col3'		=> "$data->keterangan",
					'action'	=> "<span><a onclick='_btnEdit(\"$data->id\",\"$data->kode_ruangan\",\"$data->nama_ruangan\")'><button type='button' class='btn bg-gradient-info'><i class='nav-icon fas fa-pen'></i> Ubah</button></a></span><span><a  onclick='_btnDelete(\"$data->id\",\"$data->kode_ruangan\",\"$data->nama_ruangan\")'><button type='button' class='btn bg-gradient-danger'><i class='nav-icon fas fa-trash'></i> Hapus</button></a></span>",
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
			$this->m_ruangan->deleteSoft($id, $data);
			$msg = ['sukses' => 'Data ruangan telah dihapus.'];
			echo json_encode($msg);
		} else {
			exit('Request Error');
		}
	}

	public function insert_data()
	{
		if ($this->request->isAJAX()) {
			$kode_ruangan				= strtoupper($this->request->getVar('kode_ruangan'));
			$nama_ruangan				= strtoupper($this->request->getVar('nama_ruangan'));
			$keterangan					= $this->request->getVar('keterangan');
			$data = [
				'kode_ruangan'			=> $kode_ruangan,
				'nama_ruangan'			=> $nama_ruangan,
				'keterangan'			=> $keterangan,
				'created_user'			=> session()->get('id'),
				'created_dttm'			=> date('Y-m-d H:i:s'),
			];
			$insert	= $this->m_ruangan->insertData($data);
			if ($insert == TRUE) {
				echo json_encode(['status'	=> TRUE]);
			} else {
				echo json_encode(['kode'	=> "Kode Ruangan: <b class='text-danger'>$kode_ruangan</b> sudah ada, silahkan coba yang lain."]);
			}
		} else {
			exit('Request Error');
		}
	}

	public function get_edit()
	{
		if ($this->request->isAJAX()) {
			$id		= $this->request->getVar('id');
			$data	= $this->m_ruangan->get_id($id)->getRowArray();
			echo json_encode($data);
		} else {
			exit('Request Error');
		}
	}

	public function update_data()
	{
		if ($this->request->isAJAX()) {
			$id							= $this->request->getVar('id');
			$kode_ruangan				= strtoupper($this->request->getVar('kode_ruangan'));
			$nama_ruangan				= strtoupper($this->request->getVar('nama_ruangan'));
			$keterangan					= $this->request->getVar('keterangan');
			$data = [
				'kode_ruangan'			=> $kode_ruangan,
				'nama_ruangan'			=> $nama_ruangan,
				'keterangan'			=> $keterangan,
				'updated_user'			=> session()->get('id'),
				'updated_dttm'			=> date('Y-m-d H:i:s'),
			];
			$insert	= $this->m_ruangan->updateData($id, $data);
			if ($insert == TRUE) {
				echo json_encode(['status'	=> TRUE]);
			}
		} else {
			exit('Request Error');
		}
	}
}
