<?= $this->extend('admin/layout/main_layout'); ?>
<!-- MAIN CONTENT -->
<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('panel/dashboard'); ?>">Dashboard</a></li>
						<li class="breadcrumb-item active"><?= $title; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<?php
	$session	= session();
	$id	= session()->get('id');
	if ((session()->get('jenis_kelamin')) == 'L') {
		$avatar = "<img  class='profile-user-img img-fluid img-circle' src='" . base_url() . "/assets-admin/img/male.png' class='rounded-circle'>";
		$jk		= "Laki-laki";
	} else {
		$avatar = "<img  class='profile-user-img img-fluid img-circle' src='" . base_url() . "/assets-admin/img/female.png' class='rounded-circle'>";
		$jk		= "Perempuan";
	}
	?>

	<section class="content">
		<div class="container-fluid">
			<?php foreach ($akun as $res) :

				if ($res->jenis_kelamin == 'L') {
					$avatar = "<img  class='profile-user-img img-fluid img-circle' src='" . base_url() . "/assets-admin/img/male.png' class='rounded-circle'>";
					$jk		= "Laki-laki";
				} else {
					$avatar = "<img  class='profile-user-img img-fluid img-circle' src='" . base_url() . "/assets-admin/img/female.png' class='rounded-circle'>";
					$jk		= "Perempuan";
				}

			?>
						 <?= form_open()?>
				<div class="row" id="viewData">
					<div class="col-4">

						<!-- Profile Image -->
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<?= $avatar; ?>
								</div>

								<h3 class="profile-username text-center" id="nama"><?= $res->nama ?></h3>

								<p class="text-muted text-center" id="email"><?= $res->username ?></p>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->

						<!-- About Me Box -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Informasi Profil</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<strong><i class="fas fa-envelope mr-1"></i>Email</strong>

								<p class="text-muted" id="email"><?= $res->email ?></p>

								<hr>

								<strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>

								<p class="text-muted" id="jenis_kelamin"><?= $jk ?></p>

								<hr>

								<strong id="telepon"><i class="fas fa-phone-alt mr-1"></i> Telepon</strong>

								<p class="text-muted" id="telepon"><?= $res->telepon ?></p>


								<hr>

								<strong><i class="far fa-address-card mr-1"></i> Alamat</strong>

								<p class="text-muted" id="alamat"><?= $res->alamat ?></p>
							</div>
							<hr>
							<div style="text-align: center;margin-bottom:15px;">
								<span><a onclick="_btnEdit(<?= $res->id?>)"><button type="button" class="btn bg-gradient-info"><i class="nav-icon fas fa-pen"></i> Perubahan</button></a></span>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<div id='formData' class='col-8'></div>

					<!-- /.col -->
				</div>
				<?= form_close()?>
			<?php endforeach ?>

			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
</div>
<!-- Modal -->
<?= $this->endSection() ?>
