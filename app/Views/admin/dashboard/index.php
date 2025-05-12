<?= $this->extend('admin/layout/main_layout'); ?>
<!-- MAIN CONTENT -->
<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info text-center">
						<div class="inner">
							<h3><?= $data1; ?></h3>

							<p>Proses</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success text-center">
						<div class="inner">
							<h3><?= $data2; ?></h3>

							<p>Setuju</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning text-center">
						<div class="inner">
							<h3><?= $data3; ?></h3>

							<p>Tolak</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<?= $this->endSection() ?>
