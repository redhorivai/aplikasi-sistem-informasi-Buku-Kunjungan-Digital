<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengunjungModel;


class Pengunjung extends BaseController
{
	protected $m_pengunjung;
	protected $session;

	public function __construct()
	{
		$this->m_pengunjung = new PengunjungModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}
	public function index()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('error', 'Anda belum login! Silahkan login terlebih dahulu');
			return redirect()->to(base_url('/admin'));
		}
		$data = ['title' => 'data pengunjung', 'active' => 'pengunjung'];
		return view('admin/pengunjung/index', $data);
	}

	public function getData()
	{
		$res 	= $this->m_pengunjung->getPengunjung();
		$nomor	= 1;
		if (count($res) > 0) {
			foreach ($res as $data) {
				if ($data->status == "proses") {
					$status_pengajuan =	"<i style='color:#007bff;'>status: proses</i>";
				} elseif ($data->status == "diterima") {
					$status_pengajuan =	"<i style='color:#28a745;'>status: diterima</i>";
				} else {
					$status_pengajuan =	"<i style='color:#dc3545;'>status: ditolak</i>";
				}
				#data col2
				$resGet1	= "
				<div><b>Nama:</b> $data->nama_pemohon</div>
				<div><b>Instansi:</b> $data->nama_instansi</div>
				<div><b>Asal:</b> $data->nama_provinsi ($data->nama_kota)</div>
				";
				$resGet2	= "<button class='btn btn-sm bg-gradient-warning'><a href='".base_url()."/uploads/$data->file_surat' target='_blank'><i class='nav-icon fas fa-download'></i> file surat</button></a>
				";
				$output[] = array(
					'col1'				=> $nomor++,
					'col2'				=> "$resGet1",
					'col3'				=> "$data->tgl_kunjungan",
					'col4'				=> "$data->no_surat",
					'col5'				=> "$status_pengajuan",
					'col6'				=> "$resGet2",
					'action'	=> "<span><a onclick='_btnKonfir(\"$data->id\",\"$data->nama_pemohon\",\"$data->nama_instansi\")'><button type='button' class='btn btn-sm bg-gradient-info'><i class='nav-icon fas fa-pen'></i> Konfirmas</button></a></span><span><a  onclick='_btnDelete(\"$data->id\",\"$data->nama_pemohon\",\"$data->nama_instansi\")'><button type='button' class='btn btn-sm bg-gradient-danger'><i class='nav-icon fas fa-trash'></i> Hapus</button></a></span>",
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
			$this->m_pengunjung->deleteSoft($id, $data);
			$msg = ['sukses' => 'Data user telah dihapus.'];
			echo json_encode($msg);
		} else {
			exit('Request Error');
		}
	}

	public function get_konfir()
	{
		if ($this->request->isAJAX()) {
			$id		= $this->request->getVar('id');
			$data	= $this->m_pengunjung->get_id($id)->getRowArray();
			echo json_encode($data);
		} else {
			exit('Request Error');
		}
	}
	public function konfir_data()
	{
		if ($this->request->isAJAX()) {
			$id				= $this->request->getVar('id');
			$status			= $this->request->getVar('status');
			$pesan_status	= $this->request->getVar('pesan_status');
			$data = [
				'status'				=> $status,
				'pesan_status'			=> $pesan_status,
				'updated_user'			=> session()->get('id'),
				'updated_dttm'			=> date('Y-m-d H:i:s'),
			];
			$insert	= $this->m_pengunjung->konfirData($id, $data);
			if ($insert == TRUE) {
				echo json_encode(['status'	=> TRUE]);
			}
		} else {
			exit('Request Error');
		}
	}
}
