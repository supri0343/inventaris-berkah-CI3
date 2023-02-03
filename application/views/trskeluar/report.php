<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/bootstrap-3.3.2/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" >
			<thead>
				<tr>
					<th align="left">Kode Barang</th>
					<th align="left">Nama Barang</th>
					<th align="left">Masuk</th>
					<th align="left">Keterangan</th>
					<th align="left">Keluar</th>
					<th align="left">Keterangan</th>
				</tr>
			<tr>
				<th colspan="6"><hr></th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($barang as $b): ?>
					<tr>
						<td><?= $b->kode_barang ?></td>
						<td><?= $b->nama_barang ?></td>
						<td>
							<?php

							if($_GET['laporan'] == 'Bulanan'){
								$masuk = $this->db->query('select sum(jumlah) as total from trsdet_masuk where nama_barang = "'.$b->nama_barang.'" and month(updated_at) = "'.$_GET['bulan'].'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else if($_GET['laporan'] == 'Tahunan'){
								$masuk = $this->db->query('select sum(jumlah) as total from trsdet_masuk where nama_barang = "'.$b->nama_barang.'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else{
								$masuk = $this->db->query('select sum(jumlah) as total from trsdet_masuk where nama_barang = "'.$b->nama_barang.'" and date(updated_at) = "'.$_GET['tanggal'].'" ')->row_array();
							}

							if($masuk['total'] == ''){
								echo '0';
							}else{
								echo $masuk['total'];
							}

							?>
						</td>
						<td>
							<?php
							if($_GET['laporan'] == 'Bulanan'){
								$keterangan_masuk = $this->db->query('select distinct group_concat(keterangan, "") as total from trsdet_masuk where nama_barang = "'.$b->nama_barang.'" and month(updated_at) = "'.$_GET['bulan'].'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else if($_GET['laporan'] == 'Tahunan'){
								$keterangan_masuk = $this->db->query('select distinct group_concat(keterangan, "") as total from trsdet_masuk where nama_barang = "'.$b->nama_barang.'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else{
								$keterangan_masuk = $this->db->query('select distinct group_concat(keterangan, "") as total from trsdet_masuk where nama_barang = "'.$b->nama_barang.'" and date(updated_at) = "'.$_GET['tanggal'].'" ')->row_array();
							}
							echo $keterangan_masuk['total'];
							?>
						</td>
						<td>
							<?php

							if($_GET['laporan'] == 'Bulanan'){
								$keluar = $this->db->query('select sum(jumlah) as total from trsdet_keluar where nama_barang = "'.$b->nama_barang.'" and month(updated_at) = "'.$_GET['bulan'].'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else if($_GET['laporan'] == 'Tahunan'){
								$keluar = $this->db->query('select sum(jumlah) as total from trsdet_keluar where nama_barang = "'.$b->nama_barang.'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else{
								$keluar = $this->db->query('select sum(jumlah) as total from trsdet_keluar where nama_barang = "'.$b->nama_barang.'" and date(updated_at) = "'.$_GET['tanggal'].'" ')->row_array();
							}

							if($keluar['total'] == ''){
								echo '0';
							}else{
								echo $keluar['total'];
							}
							?>
						</td>
						<td>
							<?php

							if($_GET['laporan'] == 'Bulanan'){
								$keterangan_keluar = $this->db->query('select distinct group_concat(keterangan, "") as total from trsdet_keluar where nama_barang = "'.$b->nama_barang.'" and month(updated_at) = "'.$_GET['bulan'].'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else if($_GET['laporan'] == 'Tahunan'){
								$keterangan_keluar = $this->db->query('select distinct group_concat(keterangan, "") as total from trsdet_keluar where nama_barang = "'.$b->nama_barang.'" and year(updated_at) = "'.$_GET['tahun'].'" ')->row_array();
							}else{
								$keterangan_keluar = $this->db->query('select distinct group_concat(keterangan, "") as total from trsdet_keluar where nama_barang = "'.$b->nama_barang.'" and date(updated_at) = "'.$_GET['tanggal'].'" ')->row_array();
							}

							echo $keterangan_keluar['total'];

							?>

					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>
