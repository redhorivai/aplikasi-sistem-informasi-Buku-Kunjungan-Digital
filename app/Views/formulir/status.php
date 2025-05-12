<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Buku Kunjungan Digital</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/css/adminlte.min.css">
	<!-- Datatables -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<div class="container-fluid" style="background-color: #2b7668;">
			<div class="row py-2 px-lg-5">
				<div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0" style="height: 25px;">
					<div class="d-inline-flex align-items-center text-white">
						<h7><i class="fa fa-phone-alt mr-2"></i>Donate Dana: (+62) 852-7308-3460</h7>
						<h7 class="px-3">|</h7>
						<h7><i class="fa fa-envelope mr-2"></i>sriwijayabersamateknologi@gmail.com</h7>
					</div>
				</div>
				<div class="col-lg-6 text-center text-lg-right">
					<div class="d-inline-flex align-items-center">
						<a class="text-white px-2" href="https://www.facebook.com/groups/sribertech">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a class="text-white px-2" href="https://github.com/redhorivai">
							<i class="fab fa-github"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<section class="content-header">
			<div class="container-fluid">
				<div class="col-12">
					<h3 class="float-right" id="waktu"></h3>
					<div class="row mb-3">
						<div>
							<a href="<?= base_url('/') ?>"><button type="button" class="btn btn-block btn-info nav-link <?php if ($active == "kunjungan") {
																															echo "active";
																														} ?>">Kunjungan</button> </a>
						</div>
						&nbsp;
						<div>
							<a href="<?= base_url('/status') ?>"><button type="button" class="btn btn-block btn-info nav-link <?php if ($active == "status") {
																																	echo "active";
																																} ?>"> Informasi Status</button> </a>
						</div>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<!-- Main content -->
		<section class="content" style="margin-top: 30px;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<!-- /.card-header -->
							<div class="card-body">
								<?= form_open() ?>
								<table id="viewTable" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Nama Pemohon</th>
											<th>Nama Instansi</th>
											<th>Tanggal Kunjungan</th>
											<th>Instansi Tujuan</th>
											<th>Topik</th>
											<th>Status</th>
											<th>Info</th>
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
	</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container-fluid -->
	</section>
	<!-- /.content-wrapper -->
	<!-- /.content-wrapper -->

	</div>
	<footer class="main-footer">
		<strong>Copyright &copy;
			<script>
				document.write(new Date().getFullYear());
			</script>
			<a href="https://www.facebook.com/groups/sribertech" target="_blank">Sribertech </a><small class="float-right">pembaruan aplikasi <a href="https://github.com/redhorivai"> github</a></small>
		</strong>
	</footer>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url(); ?>/assets-admin/js/adminlte.min.js"></script>
	<!-- Datatables -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</body>

</html>

<script type="text/javascript">
	$(function() {
		_getStatus();
	});

	function _getStatus() {
		$("#viewTable").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			language: {
				searchPlaceholder: 'Cari...',
				sSearch: '',
				lengthMenu: '_MENU_',
				emptyTable: 'Tidak ada data'
			},
			"order": [],
			"columnDefs": [{
				"targets": [3, 4, 5, 6],
				"orderable": false
			}, ],
			"columns": [{
					"data": "col1"
				},
				{
					"data": "col2"
				},
				{
					"data": "col3"
				},
				{
					"data": "col4"
				},
				{
					"data": "col5"
				},
				{
					"data": "col6"
				},
				{
					"data": "col7"
				},
			],
			"ajax": "<?= site_url('Home/getData') ?>",
		});
	}
</script>
