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

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<span><a onclick="_tambahData()"><button type="button" class="btn bg-gradient-primary"><i class="nav-icon fas fa-plus"></i> Tambah Data</button></a></span>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<?= form_open() ?>
							<table id="viewTable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="width:20px;">No</th>
										<th>Kode Ruangan</th>
										<th>Nama Ruangan</th>
										<th>Keterangan</th>
										<th style="width: 167px;">Aksi</th>
									</tr>
								</thead>
							</table>
							<?= form_close() ?>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" id='form' class="form-data">
				<input type="hidden" name="id">
				<div class="modal-body">
					<div class="card-body">
						<div class="form-group">
							<label>Kode Ruangan: <span class='text-danger'>*</span></label>
							<input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan" placeholder="masukan kode ruangan" onchange="remove(id)">
						</div>
						<div class="form-group">
							<label>Nama Ruangan: <span class='text-danger'>*</span></label>
							<input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="masukan nama ruangan" onchange="remove(id)">
						</div>
						<div class="form-group">
							<label>Keterangan: <span class='text-danger'>*</span></label>
							<textarea rows="3" id="keterangan" name="keterangan" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary" onclick="_simpanData()">Simpan Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->
<?= $this->endSection() ?>
