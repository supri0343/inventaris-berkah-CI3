<?php

use Dompdf\Dompdf;

class Lap_bulanan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'owner' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'barang';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_satuan', 'm_satuan');
	}

	public function index(){
		$this->data['title'] = 'Laporan Bulanan';
		$this->load->view('lap_bulanan/lihat', $this->data);
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_barang'] = $this->m_barang->lihat();
		$this->data['title'] = 'Laporan Data Barang';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('barang/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
