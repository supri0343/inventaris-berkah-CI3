<?php

class M_trskeluar extends CI_Model {
	protected $_table = 'trs_keluar';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_keluar($no_keluar){
		return $this->db->get_where($this->_table, ['no_keluar' => $no_keluar])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_keluar){
		return $this->db->delete($this->_table, ['no_keluar' => $no_keluar]);
	}

	public function laporan_harian($tgl){
		//return $this->db->get_where($this->_table, ['tgl_keluar' => $tgl])->result();
		$this->db->select('a.*, b.nama_barang');
		$this->db->from('trs_keluar as a');
		$this->db->join('trsdet_keluar as b','a.no_keluar=b.no_keluar');
		$this->db->where('tgl_keluar', $tgl);
		$query = $this->db->get();
		return $query->result();

	}

	public function laporan_bulanan($bulan, $tahun){
		//return $this->db->get_where($this->_table, ['month(tgl_keluar)' => $bulan, 'year(tgl_keluar)' => $tahun ])->result();
		$this->db->select('a.*, b.nama_barang');
		$this->db->from('trs_keluar as a');
		$this->db->join('trsdet_keluar as b','a.no_keluar=b.no_keluar');
		$this->db->where('month(tgl_keluar)', $bulan);
		$this->db->where('year(tgl_keluar)', $tahun);
		$query = $this->db->get();
		return $query->result();
	}

	public function laporan_tahunan($tahun){
		$this->db->select('a.*, b.nama_barang');
		$this->db->from('trs_keluar as a');
		$this->db->join('trsdet_keluar as b','a.no_keluar=b.no_keluar');
		//$this->db->where('month(tgl_keluar)', $bulan);
		$this->db->where('year(tgl_keluar)', $tahun);
		$query = $this->db->get();
		return $query->result();
	}

}
