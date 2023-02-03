<ul class="navbar-nav toggled bg-gradient sidebar sidebar-light accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<!-- <div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-boxes"></i>
				</div> -->
				<div class="sidebar-brand-text mx-3">UD. BERKAH JAYA</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('dashboard') ?>">
					<!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
					<i class="fa fa-home" aria-hidden="true"></i>
					<span>Home</span></a>
			</li>
			<hr class="sidebar-divider">

			<?php if ($this->session->login['role'] == 'admin'){ ?>
			<div class="sidebar-heading">
				Master Data
			</div>

			<li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('barang') ?>">
				<i class="fas fa-boxes"></i>
					<span>Barang</span></a>
			</li>

			<!-- <li class="nav-item <?= $aktif == 'satuan' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('satuan') ?>">
					<i class="fas fa-balance-scale"></i>
					<span>Satuan</span></a>
			</li> -->

			<!-- <li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('customer') ?>">
					<i class="fas fa-fw fa-user"></i>
					<span>Customer</span></a>
			</li> -->

			<li class="nav-item <?= $aktif == 'supplier' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('supplier') ?>">
				<i class="fas fa-truck-loading"></i>
					<span>Supplier</span></a>
			</li>

<!--			<li class="nav-item --><?//= $aktif == 'petugas' ? 'active' : '' ?><!--">-->
<!--				<a class="nav-link" href="--><?//= base_url('petugas') ?><!--">-->
<!--					<i class="fa fa-user-plus"></i>-->
<!--					<span>Kelola Admin</span></a>-->
<!--			</li>-->

			<li class="nav-item <?= $aktif == 'toko' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('toko') ?>">
					<i class="fas fa-fw fa-building"></i>
					<span>Kelola Usaha</span></a>
			</li>

			<!-- <li class="nav-item <?= $aktif == 'petugas' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('petugas') ?>">
					<i class="fas fa-fw fa-users"></i>
					<span>Master Petugas (Admin)</span></a>
			</li> -->

			<!-- Divider -->
			<hr class="sidebar-divider">
	
			<div class="sidebar-heading">
				Transaksi
			</div>

			<li class="nav-item <?= $aktif == 'trsmasuk' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('trsmasuk') ?>">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Barang Masuk</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'trskeluar' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('trskeluar') ?>">
					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Barang Keluar</span></a>
			</li>

			<hr class="sidebar-divider">
			<?php } ?>
			<?php if ($this->session->login['role'] == 'owner' || $this->session->login['role'] == 'admin'): ?>
				<!-- Heading -->
			<div class="sidebar-heading">
					Laporan
			</div>


				<li class="nav-item <?= $aktif == 'lap_harian' ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('lap_harian') ?>">
						<i class="fa fa-print"></i>
						<span>Lap. Harian</span></a>
				</li>

				<li class="nav-item <?= $aktif == 'lap_bulanan' ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('lap_bulanan') ?>">
						<i class="fas fa-fw fa-print"></i>
						<span>Lap. Bulanan</span></a>
				</li>

				<li class="nav-item <?= $aktif == 'lap_tahunan' ? 'active' : '' ?>">
					<a class="nav-link" href="<?= base_url('lap_tahunan') ?>">
						<i class="fas fa-fw fa-print"></i>
						<span>Lap. Tahunan</span></a>
				</li>





				<!-- Divider -->
			<?php endif; ?>
			<!-- <hr class="sidebar-divider d-none d-md-block"> -->

			<!-- Sidebar Toggler (Sidebar) -->
			<!-- <div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div> -->
		</ul>
