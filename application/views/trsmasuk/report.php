<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>

	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<style>
		#customers {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#customers td, #customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #04AA6D;
			color: white;
		}
	</style>
</head>
<body>

<div class="row">
	<div class="col-sm-12">
		<h1 style="font-size: 2.5rem;text-align: center;">UD. Berkah Jaya</h1>
		<p style="text-align: center;">Daleman, Jati, Gatak, Sukoharjo RT01/01 <br> No.Telp 0895-3791-37092</p>
	</div>
</div>
<hr style="border-style: dotted;">
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>

		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="customers" width="100%" cellspacing="0">

				<tr>
					<th>No Terima</th>
					<th>Nama Admin</th>
					<th>Nama Supplier/Pelanggan</th>
					<th>Nama Barang</th>
					<th>Tanggal Terima/Keluar</th>
				</tr>


				<?php foreach ($trsmasuk as $masuk): ?>
					<tr>
						<td><?= $masuk->no_terima ?></td>
						<td><?= $masuk->nama_petugas ?></td>
						<td><?= $masuk->nama_supplier ?></td>
						<td><?= $masuk->nama_barang ?></td>
						<td><?= $masuk->tgl_terima ?> Pukul <?= $masuk->jam_terima ?></td>
					</tr>
				<?php endforeach ?>

		</table>
	</div>

<div class="row">
	<div class="col-sm-12" style="margin-top: 200px; text-align: right;padding-right: 100px;">

			( <?php echo $this->session->login['nama']; ?> )

	</div>
</div>

</body>
</html>
