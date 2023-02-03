<?php

use Dompdf\Dompdf;

class Lap_harian extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'owner' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'barang';
		$this->load->model('M_trsmasuk', 'm_trsmasuk');
		$this->load->model('M_trskeluar', 'm_trskeluar');
		$this->load->model('M_barang', 'm_barang');
	}

	public function index(){
		$this->data['title'] = 'Laporan Harian';
		$this->load->view('lap_harian/lihat', $this->data);
	}


	public function export(){
		$jenis = $_GET['jenis'];
		$laporan = $_GET['laporan'];
		$dompdf = new Dompdf();
		if($jenis == 'BM'){
//			if($laporan == 'Harian'){
//				$this->data['trsmasuk'] = $this->m_trsmasuk->laporan_harian($_GET['tanggal']);
//				$file = 'trsmasuk/report';
//				$this->data['title'] = 'Laporan Harian Masuk - '.$_GET['tanggal'];
//			}else if($laporan == 'Bulanan'){
//				$this->data['trsmasuk'] = $this->m_trsmasuk->laporan_bulanan($_GET['bulan'], $_GET['tahun']);
//				$file = 'trsmasuk/report';
//				$this->data['title'] = 'Laporan Bulanan Masuk - '.$_GET['bulan'].' / '.$_GET['tahun'];
//			}else{
//				$this->data['trsmasuk'] = $this->m_trsmasuk->laporan_tahunan($_GET['tahun']);
//				$file = 'trsmasuk/report';
//				$this->data['title'] = 'Laporan Tahunan Masuk - '.$_GET['tahun'];
//			}
		}else{
			if($laporan == 'Harian'){
				$this->data['all_pengeluaran'] = $this->m_trskeluar->laporan_harian($_GET['tanggal']);
				$this->data['barang'] = $this->m_barang->lihat();
				$file = 'trskeluar/report';
				$this->data['title'] = 'Laporan Harian - '.$_GET['tanggal'];
			}else if($laporan == 'Bulanan'){
				$this->data['all_pengeluaran'] = $this->m_trskeluar->laporan_bulanan($_GET['bulan'], $_GET['tahun']);
				$this->data['barang'] = $this->m_barang->lihat();
				$file = 'trskeluar/report';
				$this->data['title'] = 'Laporan Bulanan - '.$_GET['bulan'].' / '.$_GET['tahun'];
			}else{
				$this->data['all_pengeluaran'] = $this->m_trskeluar->laporan_tahunan($_GET['tahun']);
				$this->data['barang'] = $this->m_barang->lihat();
				$file = 'trskeluar/report';
				$this->data['title'] = 'Laporan Tahunan - '.$_GET['tahun'];
			}
		}



		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view($file, $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
