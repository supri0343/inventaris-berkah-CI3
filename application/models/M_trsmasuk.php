<?php

class M_trsmasuk extends CI_Model {
	protected $_table = 'trs_masuk';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_terima($no_terima){
		return $this->db->get_where($this->_table, ['no_terima' => $no_terima])->row();
	}

	public function laporan_harian($tgl){
//		$this->db->select('a.*, b.nama_barang');
//		$this->db->from('trs_masuk as a');
//		$this->db->join('trsdet_masuk as b','a.no_terima=b.no_terima');
//		$this->db->where('tgl_terima', $tgl);
		$query = $this->db->query('select distinc');
		return $query->result();
	}

	public function laporan_bulanan($bulan, $tahun){
		//return $this->db->get_where($this->_table, ['month(tgl_terima)' => $bulan, 'year(tgl_terima)' => $tahun ])->result();
		$this->db->select('a.*, b.nama_barang');
		$this->db->from('trs_masuk as a');
		$this->db->join('trsdet_masuk as b','a.no_terima=b.no_terima');
		$this->db->where('month(tgl_terima)', $bulan);
		$this->db->where('year(tgl_terima)', $tahun);
		$query = $this->db->get();
		return $query->result();
	}

	public function laporan_tahunan($tahun){

		$this->db->select('a.*, b.nama_barang');
		$this->db->from('trs_masuk as a');
		$this->db->join('trsdet_masuk as b','a.no_terima=b.no_terima');
		$this->db->where('year(tgl_terima)', $tahun);
		$query = $this->db->get();
		return $query->result();

		//return $this->db->get_where($this->_table, [ 'year(tgl_terima)' => $tahun ])->result();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_terima){
		return $this->db->delete($this->_table, ['no_terima' => $no_terima]);
	}
}
