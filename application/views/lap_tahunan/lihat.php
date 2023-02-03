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
			<div id="content" data-url="<?= base_url('barang') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<!-- <div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div> -->
					<!-- <div class="float-right">
						<?php if ($this->session->login['role'] == 'admin'): ?>
							<a href="<?= base_url('barang/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Cetak</a>
							<a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
					<div class="card-header"><strong>Laporan Tahunan</strong>
					</div>

					
					<div class="card-body">
						<div class="row">
							<div class="col-md-1">
								<p>Filter:</p>
							</div>

							<div class="col-md-2">
								<select class="form-control" name="tahun" id="tahun">
									<?php
									$tahun_sekarang = date('Y');
									$tahun_bawah = Intval(date('Y'))-4;
									for ($x = $tahun_bawah; $x <= $tahun_sekarang; $x++) {
										if($x == date('Y')){
											$a = 'selected';
										}else{
											$a = '';
										}
										echo '<option value="'.$x.'" '.$a.'  >'.$x.'</option>';
									}
									?>


								</select>
							</div>
							<div class="col-md-2">
								<button class="btn btn-primary" onclick="redirect()">Submit</button>
							</div>

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
	<script>

		function redirect(){
			var laporan = 'Tahunan';
			var jenis = 'tahunan';
			var tahun = document.getElementById('tahun').value;
			location.href = "<?php echo base_url('lap_harian/export') ?>?laporan="+laporan+"&jenis="+jenis+"&tahun="+tahun;
		}

	</script>
</body>
</html>
