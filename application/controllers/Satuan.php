<?php

class Satuan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'owner' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'satuan';
		$this->load->model('M_satuan', 'm_satuan');
	}

	public function index(){
		$this->data['title'] = 'Data Satuan';
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->data['no'] = 1;

		$this->load->view('satuan/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Satuan';

		$this->load->view('satuan/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'satuan' => $this->input->post('satuan')
		];

		if($this->m_satuan->tambah($data)){
			$this->session->set_flashdata('success', 'Data Satuan <strong>Berhasil</strong> Ditambahkan!');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('error', 'Data Satuan <strong>Gagal</strong> Ditambahkan!');
			redirect('satuan');
		}
	}

	public function ubah($kode_satuan){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Satuan';
		$this->data['satuan'] = $this->m_satuan->lihat_id($kode_satuan);

		$this->load->view('satuan/ubah', $this->data);
	}

	public function proses_ubah($kode_satuan){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'satuan' => $this->input->post('satuan')
		];

		if($this->m_satuan->ubah($data, $kode_satuan)){
			$this->session->set_flashdata('success', 'Data Satuan <strong>Berhasil</strong> Diubah!');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('error', 'Data Satuan <strong>Gagal</strong> Diubah!');
			redirect('satuan');
		}
	}

	public function hapus($kode_satuan){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->m_satuan->hapus($kode_satuan)){
			$this->session->set_flashdata('success', 'Data Satuan <strong>Berhasil</strong> Dihapus!');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('error', 'Data Satuan <strong>Gagal</strong> Dihapus!');
			redirect('satuan');
		}
	}
	
}
