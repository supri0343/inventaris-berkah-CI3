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
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-header">
							<div class="float-left">
					<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
							<div class="float-right">
						<a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div></div>
							<div class="card-body">
								<form action="<?= base_url('barang/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="kode_barang"><strong>Kode Barang</strong></label>
											<input type="text" name="kode_barang" placeholder="Kode Barang" autocomplete="off"  class="form-control" required value="B<?= mt_rand(10000000, 99999999) ?>" maxlength="8" readonly>
										</div>
										<div class="form-group col-md-6">
											<label for="nama_barang"><strong>Nama Barang</strong></label>
											<input type="text" name="nama_barang" placeholder="" autocomplete="off"  class="form-control" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="stok"><strong>Stok</strong></label>
											<input type="number" name="stok" placeholder="" autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-md-6">
											<label for="satuan"><strong>Satuan</strong></label>
											<input type="text" name="satuan" placeholder="" autocomplete="off"  class="form-control" required>
											<!-- <select name="satuan" id="satuan" class="form-control" required> -->
												<!-- <?php foreach ($satuan as $satuan): ?>
													<option value="<?= $satuan->satuan ?>"><?= $satuan->satuan ?></option>
												<?php endforeach ?> -->
											<!-- </select> -->
										</div>
									</div>
									
									<hr>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
									</div>
								</form>
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
</body>
</html>