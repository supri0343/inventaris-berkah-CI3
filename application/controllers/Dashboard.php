<?php

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'owner' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_users', 'm_users');
		$this->load->model('M_trskeluar', 'M_trskeluar');
		$this->load->model('M_trsmasuk', 'M_trsmasuk');
		$this->load->model('M_toko', 'm_toko');
	}

	public function index(){
		$this->data['no'] = 1;
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['jumlah_barang'] = $this->m_barang->jumlah();
		$this->data['jumlah_supplier'] = $this->m_supplier->jumlah();
		$this->data['jumlah_petugas'] = $this->m_users->jumlah();
		$this->data['jumlah_keluar'] = $this->M_trskeluar->jumlah();
		$this->data['jumlah_masuk'] = $this->M_trsmasuk->jumlah();
		$this->data['jumlah_pengguna'] = $this->m_users->jumlah();
		$this->data['toko'] = $this->m_toko->lihat();
		$this->load->view('dashboard', $this->data);
	}
}
