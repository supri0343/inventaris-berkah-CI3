<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('trsmasuk') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<!-- <div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div> -->
					<!-- <div class="float-right">
						<?php if ($this->session->login['role'] == 'admin'): ?>
							<a href="<?= base_url('trsmasuk/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Cetak</a>
							<a href="<?= base_url('trsmasuk/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
						<?php else : ?>
							<a href="<?= base_url('trsmasuk/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Cetak</a>
							<?php endif ?>
					</div> -->
				</div>
				<!-- <hr> -->
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<div class="card shadow">
					<div class="card-header"><strong>Daftar Barang Masuk</strong>
						<div class="float-right">
							<?php if ($this->session->login['role'] == 'admin'): ?>
								<a href="<?= base_url('trsmasuk/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Cetak</a>
								<a href="<?= base_url('trsmasuk/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
							<?php else : ?>
								<a href="<?= base_url('trsmasuk/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Cetak</a>
								<?php endif ?>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No</td>
										<td>No Terima</td>
										<td>Nama Petugas</td>
										<td>Nama Supplier</td>
										<td>Tanggal Terima</td>
										<?php if ($this->session->login['role'] == 'admin'): ?>
											<td>Aksi</td>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_masuk as $masuk): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $masuk->no_terima ?></td>
											<td><?= $masuk->nama_petugas ?></td>
											<td><?= $masuk->nama_supplier ?></td>
											<td><?= $masuk->tgl_terima ?> <?= $masuk->jam_terima ?></td>
											<?php if ($this->session->login['role'] == 'admin'): ?>
											<td>
												<a href="<?= base_url('trsmasuk/detail/' . $masuk->no_terima) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
												<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('trsmasuk/hapus/' . $masuk->no_terima) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
											</td>
											<?php endif ?>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>				
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>