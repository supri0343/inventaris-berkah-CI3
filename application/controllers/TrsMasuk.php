<?php

use Dompdf\Dompdf;

class TrsMasuk extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'trsmasuk';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_trsmasuk', 'm_trsmasuk');
		$this->load->model('M_detail_terima', 'm_detail_terima');
	}

	public function index(){
		$this->data['title'] = 'Barang Masuk';
		$this->data['all_masuk'] = $this->m_trsmasuk->lihat();
		$this->data['no'] = 1;

		$this->load->view('trsmasuk/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi  (Re Stock Barang)';
		$this->data['all_barang'] = $this->m_barang->lihat_stok();
		$this->data['all_supplier'] = $this->m_supplier->lihat_spl();

		$this->load->view('trsmasuk/tambah', $this->data);
	}

	public function proses_tambah(){
		$jumlah_barang_diterima = count($this->input->post('nama_barang_hidden'));

		$data_terima = [
			'no_terima' => $this->input->post('no_terima'),
			'tgl_terima' => date('Y-m-d', strtotime($this->input->post('tgl_terima'))),
			'jam_terima' => $this->input->post('jam_terima'),
			'nama_supplier' => $this->input->post('nama_supplier'),
			'nama_petugas' => $this->input->post('nama_petugas'),
		];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['no_terima' => $this->input->post('no_terima')]);
			$data_detail_terima[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
			$data_detail_terima[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_terima[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_terima[$i]['keterangan'] = $this->input->post('keterangan_hidden')[$i];
		}

		if($this->m_trsmasuk->tambah($data_terima) && $this->m_detail_terima->tambah($data_detail_terima)){
			for ($i=0; $i < $jumlah_barang_diterima ; $i++) { 
				$this->m_barang->plus_stok($data_detail_terima[$i]['jumlah'], $data_detail_terima[$i]['nama_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Barang Masuk</strong> Berhasil Dibuat!');
			redirect('trsmasuk');
		}
	}

	public function detail($no_terima){
		$this->data['title'] = 'Detail Barang';
		$this->data['trsmasuk'] = $this->m_trsmasuk->lihat_no_terima($no_terima);
		$this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($no_terima);
		$this->data['no'] = 1;

		$this->load->view('trsmasuk/detail', $this->data);
	}

	public function hapus($no_terima){
		if($this->m_trsmasuk->hapus($no_terima) && $this->m_detail_terima->hapus($no_terima)){
			$this->session->set_flashdata('success', 'Invoice Barang Masuk <strong>Berhasil</strong> Dihapus!');
			redirect('trsmasuk');
		} else {
			$this->session->set_flashdata('error', 'Invoice Barang Masuk <strong>Gagal</strong> Dihapus!');
			redirect('trsmasuk');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('trsmasuk/keranjang');
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['trsmasuk'] = $this->m_trsmasuk->lihat();
		$this->data['title'] = 'Laporan Data Barang Masuk';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('trsmasuk/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Masuk Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_detail($no_terima){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['trsmasuk'] = $this->m_trsmasuk->lihat_no_terima($no_terima);
		$this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($no_terima);
		$this->data['title'] = 'Laporan Detail Barang Masuk';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('trsmasuk/detail_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Detail Barang Masuk Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
