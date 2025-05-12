<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengunjungModel;
use App\Libraries\Date\DateFunction;


class Laporan extends BaseController
{
	protected $m_pengunjung;
	protected $session;

	public function __construct()
	{
		$this->m_pengunjung = new PengunjungModel();
        $this->date = new DateFunction();
		$this->session = \Config\Services::session();
		$this->session->start();
	}
	public function index()
	{
		if (session()->get('username') == '') {
            session()->setFlashdata('error', 'Anda belum login! Silahkan login terlebih dahulu');
            return redirect()->to(base_url('/admin'));
        }
		$data = ['title' => 'data laporan', 'active' => 'laporan'];
		return view('admin/laporan/index', $data);
	}

	public function getData()
	{
		$res 	= $this->m_pengunjung->getLaporanPengunjung();
		$nomor	= 1;
		if (count($res) > 0) {
			foreach ($res as $data) {
				$tgl_pengajuan	= $this->date->panjang($data->created_dttm);
				$output[] = array(
					'col1'				=> $nomor++,
					'col2'				=> "$data->nama_pemohon",
					'col3'				=> "$data->nama_instansi",
					'col4'				=> "$tgl_pengajuan",
					'col5'				=> "$data->tgl_kunjungan",
					'col6'				=> "$data->no_surat",
					'col7'				=> "$data->alamat",
					'col8'				=> "$data->nama_provinsi $data->nama_kota",
				);
				$ret = array('data' => $output);
			}
		} else {
			$ret = array('data' => []);
		}
		return $this->response->setJSON($ret);
	}
}
