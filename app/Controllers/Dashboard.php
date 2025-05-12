<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengunjungModel;

class Dashboard extends BaseController
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
			session()->setFlashdata('error', '.');
			return redirect()->to(base_url('/admin'));
		}
		$data1 = $this->m_pengunjung->get_proses();
		$data2 = $this->m_pengunjung->get_diterima();
		$data3 = $this->m_pengunjung->get_ditolak();
		$data = ['title' => 'dashboard', 'active' => 'dashboard', 'data1' => $data1, 'data2' => $data2, 'data3' => $data3,];
		return view('admin/dashboard/index', $data);
	}
}
