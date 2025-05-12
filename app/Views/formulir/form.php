<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Buku Kunjungan Digital</title>

	<!-- google font -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/css/fonts-googleapis.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/fontawesome-free/css/all.min.css">
	<!-- tempusdominus boostrap 4 -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/toastr/toastr.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


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
			<div class="callout callout-info text-justify col-10 mx-auto">
				<h5><i class="fas fa fa-bell"></i> Profil calon tamu:</h5>
				Profil Calon Tamu Formulir ini merupakan bagian untuk memudahkan proses reservasi. Penjadwalan kunjungan secara resmi akan dilakukan setelah surat permohonan resmi dikirimkan. Mohon lakukan penjadwalan <b>min. 2 hari sebelum kunjungan</b>. Ada beberapa tahap awal dari syarat yang harus dipenuhi untuk dapat melakukan kunjungan tamu di Instansi ini. Silakan lengkapi isian data pada blangko atau formulir yang tertera dibawah ini :
			</div>
		</section>
		<?= form_open('Home/insert_data', ['class' => 'formsubmit']) ?>
		<?= csrf_field() ?>
		<!-- <form id='formsubmit' class="form-data"> -->
		<!-- <section id="viewData" class="content" style="background-color:#64b7a5;"> -->
		<div class="container-fluid" style="background-color:#7dcbb7;">
			<div class="row">
				<div class="col-8 mx-auto">
					<section id='formData'>
						<!-- DATA PEMOHON -->
						<div class="card card-info">
							<div class="card-header">
								<div class="row">
									<div class="col-12">
										<h4>
											<h5>Semua kolom yang bertanda (<b class='text-danger'>*</b>) harus diisi.</h5>
										</h4>
									</div>
									<!-- /.col -->
								</div>
								<h3 class="card-title">Data Pemohon</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="form-group">
									<label>Nama Pemohon <b class='text-danger'>*</b></label>
									<input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" onchange="remove(id)">
								</div>
								<div class="form-group">
									<label>Nama Instansi <b class='text-danger'>*</b></label>
									<input type="text" class="form-control" id="nama_instansi" name="nama_instansi" onchange="remove(id)">
								</div>
								<div class="form-group">
									<label>No Hp / WhatsApp <b class='text-danger'>*</b></label>
									<input type="number" class="form-control" id="telepon_pemohon" name="telepon_pemohon" onchange="remove(id)">
								</div>
								<div class="form-group">
									<label>Email Instansi/Lembaga/Pemohon <b class='text-danger'>*</b></label>
									<input type="text" class="form-control" id="email" name="email" onchange="remove(id)">
								</div>
								<div class='form-group'>
									<label class='t-bold'><Data></Data> Provinsi Tujuan: <span class='text-danger'>*</span></label>
									<select class='form-control select2 is-invalid' id='id_provinsi' name='id_provinsi' data-placeholder='-- Pilih Provinsi --' data-allow-clear='true' style='width:100%' onchange="remove(id)">
										<option value=""></option>
										<?php foreach ($res as $prov) : ?>
											<option value="<?= $prov->id_provinsi ?>"><?= $prov->nama_provinsi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class='form-group'>
									<label class='t-bold'><Data></Data> Kabupaten/ Kota Tujuan: <span class='text-danger'>*</span></label>
									<select class='form-control select2' id='id_kota' name='id_kota' data-placeholder='-- Pilih Kota --' data-allow-clear='true' style='width:100%' onchange="remove(id)">
										<option value=""></option>
									</select>
								</div>
								<div class=" form-group">
									<label>Alamat <b class='text-danger'>*</b></label>
									<textarea rows="3" id="alamat" name="alamat" class="form-control" onchange="remove(id)"></textarea>
								</div>
							</div>
						</div>
						<!-- DATA PEMOHON -->
						<!-- DATA RESERVASI -->
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Data Tujuan Reservasi</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="form-group">
									<label>Lokus/Tujuan OPD yang Akan Dikunjungi <b class='text-danger'>*</b></label>
									<select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" id="id_unit" name="id_unit" data-allow-clear="true" style="width:100%" data-placeholder="-- Pilih Tujuan OPD --" onchange="remove(id)">
										<option value=""></option>
										<?php foreach ($res1 as $opd) : ?>
											<option value="<?= $opd->id ?>"><?= $opd->nama_unit ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label>Tanggal & Hari Kunjungan <b class='text-danger'>*</b></label>
									<input type="datetime-local" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan" onchange="remove(id)">
								</div>
								<div class="form-group">
									<label>Topik Diskusi (terangkan dengan jelas) <b class='text-danger'>*</b></label>
									<input type="text" class="form-control" id="topik" name="topik" onchange="remove(id)">
								</div>
								<div class="form-group">
									<label>Jumlah Pengunjung <b class='text-danger'>*</b></label>
									<input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" onchange="remove(id)">
								</div>
								<div class="form-group">
									<label>Rencana Pimpinan Kunjungan <b class='text-danger'>*</b></label>
									<input type="text" class="form-control" id="pimpinan_pengunjung" name="pimpinan_pengunjung" onchange="remove(id)">
								</div>
								<div class="form-group">
									<label>Keterangan Lainnya <b class='text-danger'>*</b></label>
									<textarea rows="3" id="keterangan" name="keterangan" class="form-control"></textarea onchange="remove(id)">
								</div>
							</div>
						</div>
						<!-- DATA RESERVASI -->
						 <!-- DATA SURAT -->
						 <div class="card card-info">
								<div class="card-header">
									<h3 class="card-title">Data Surat Permohonan Kunjungan
									</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="form-group">
										<label>No. Surat Permohonan Kunjungan <b class='text-danger'>*</b></label>
										<input type="text" class="form-control" id="no_surat" name="no_surat" onchange="remove(id)">
									</div>
									<div class="form-group">
										<label>Kepada <b class='text-danger'>*</b></label>
										<input type="text" class="form-control" id="surat_kepada" name="surat_kepada" onchange="remove(id)">
									</div>
									<div class="form-group">
											<label>Surat Permohonan Kunjungan <b class='text-danger'>*</b></label>
											<input type="file" class="form-control" id="file_surat" name="file_surat" onchange="remove(id)">
									</div>
								</div>
								<hr>
								<div class="card-footer text-center text-color bg-white">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a type="submit" class="btn btn-light" href="<?= base_url('/') ?>">Cancel</a>
							</div>
						</div>
						 <!-- DATA SURAT -->
					</section>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<!-- </section> -->
		<?= form_close() ?>
		<!-- </form> -->
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
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/moment/moment.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url(); ?>/assets-admin/js/adminlte.js"></script>
	<!-- Toast -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/toastr/toastr.min.js"></script>
	<!-- Select2 -->
	<script src="<?= base_url(); ?>/assets-admin/plugins/select2/js/select2.full.min.js"></script>
	<script src="<?= base_url(); ?>/assets-admin/js/sweetalert2.all.min.js"></script>

</body>

</html>

<script type="text/javascript">
	var span = document.getElementById('waktu');
	$('.select2').select2();

	function remove(id) {
		if (id == 'id_provinsi' || id == 'id_kota' || id == 'id_unit') {
			$('#' + id).removeClass('is-invalid');
			$('#' + id + '+ span').removeClass("is-invalid");
			$('#' + id + '+ span').focus(function() {
				$(this).removeClass("is-invalid");
			});
		}
	}

	function time() {
		var d = new Date();
		var s = d.getSeconds();
		var m = d.getMinutes();
		var h = d.getHours();
		span.textContent =
			("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
	}
	setInterval(time, 1000);

	$(document).ready(function(e) {
		$('#id_provinsi').change(function() {
			let idProvinsi = $(this).val();

			if (idProvinsi) {
				$.ajax({
					url: "<?= site_url('kota/getByProv/') ?>" + idProvinsi,
					type: "GET",
					dataType: "json",
					success: function(response) {
						$('#id_kota').empty();
						$('#id_kota').append('<option value="">-- Pilih Kota Tujuan --</option>');

						if (response.length > 0) {
							$.each(response, function(index, kota) {
								$('#id_kota').append('<option value="' + kota.id_kota + '">' + kota.nama_kota + '</option>');
							});
						} else {
							$('#id_kota').append('<option value="">Tidak ada kota tersedia</option>');
						}
					},
					error: function() {
						alert('Gagal mengambil data kota. Silakan coba lagi.');
					}
				});
			} else {
				$('#id_kota').empty().append('<option value="">-- Pilih Kota Tujuan --</option>');
			}
		});
		$('.formsubmit').submit(function(e) {
			e.preventDefault();
			var nama_pemohon = $("#nama_pemohon").val();
			var nama_instansi = $("#nama_instansi").val();
			var telepon_pemohon = $("#telepon_pemohon").val();
			var email = $("#email").val();
			var id_provinsi = $("#id_provinsi").val();
			var id_kota = $("#id_kota").val();
			var alamat = $("#alamat").val();
			var id_unit = $("#id_unit").val();
			var tgl_kunjungan = $("#tgl_kunjungan").val();
			var topik = $("#topik").val();
			var jumlah_peserta = $("#jumlah_peserta").val();
			var pimpinan_pengunjung = $("#pimpinan_pengunjung").val();
			var keterangan = $("#keterangan").val();
			var no_surat = $("#no_surat").val();
			var surat_kepada = $("#surat_kepada").val();
			// var file_surat = $("#file_surat").val();
			var file_surat = $('#file_surat')[0].files[0];

			var ajaxData = new FormData();
			ajaxData.append('action', 'forms');
			ajaxData.append('nama_pemohon', nama_pemohon);
			ajaxData.append('nama_instansi', nama_instansi);
			ajaxData.append('telepon_pemohon', telepon_pemohon);
			ajaxData.append('email', email);
			ajaxData.append('id_provinsi', id_provinsi);
			ajaxData.append('id_kota', id_kota);
			ajaxData.append('alamat', alamat);
			ajaxData.append('id_unit', id_unit);
			ajaxData.append('tgl_kunjungan', tgl_kunjungan);
			ajaxData.append('topik', topik);
			ajaxData.append('jumlah_peserta', jumlah_peserta);
			ajaxData.append('pimpinan_pengunjung', pimpinan_pengunjung);
			ajaxData.append('keterangan', keterangan);
			ajaxData.append('no_surat', no_surat);
			ajaxData.append('surat_kepada', surat_kepada);
			ajaxData.append('file_surat', file_surat);

			if (nama_pemohon == "") {
				$('#nama_pemohon').addClass('is-invalid');
			} else {
				$('#nama_pemohon').removeClass('is-invalid');
			}
			if (nama_instansi == "") {
				$('#nama_instansi').addClass('is-invalid');
			} else {
				$('#nama_instansi').removeClass('is-invalid');
			}
			if (telepon_pemohon == "") {
				$('#telepon_pemohon').addClass('is-invalid');
			} else {
				$('#telepon_pemohon').removeClass('is-invalid');
			}
			if (email == "") {
				$('#email').addClass('is-invalid');
			} else {
				$('#email').removeClass('is-invalid');
			}
			if (id_provinsi == "") {
				$("#id_provinsi + span").addClass("is-invalid");
				$("#id_provinsi + span").focus(function() {
					$(this).addClass("is-invalid");
				});
			} else {
				$('#id_provinsi').removeClass('is-invalid');
				$("#id_provinsi + span").removeClass("is-invalid");
				$("#id_provinsi + span").focus(function() {
					$(this).removeClass("is-invalid");
				});
			}
			if (id_kota == "") {
				$("#id_kota + span").addClass("is-invalid");
				$("#id_kota + span").focus(function() {
					$(this).addClass("is-invalid");
				});
			} else {
				$('#id_kota').removeClass('is-invalid');
				$("#id_kota + span").removeClass("is-invalid");
				$("#id_kota + span").focus(function() {
					$(this).removeClass("is-invalid");
				});
			}
			if (id_unit == "") {
				$("#id_unit + span").addClass("is-invalid");
				$("#id_unit + span").focus(function() {
					$(this).addClass("is-invalid");
				});
			} else {
				$('#id_unit').removeClass('is-invalid');
				$("#id_unit + span").removeClass("is-invalid");
				$("#id_unit + span").focus(function() {
					$(this).removeClass("is-invalid");
				});
			}
			if (tgl_kunjungan == "") {
				$('#tgl_kunjungan').addClass('is-invalid');
			} else {
				$('#tgl_kunjungan').removeClass('is-invalid');
			}
			if (topik == "") {
				$('#topik').addClass('is-invalid');
			} else {
				$('#topik').removeClass('is-invalid');
			}
			if (jumlah_peserta == "") {
				$('#jumlah_peserta').addClass('is-invalid');
			} else {
				$('#jumlah_peserta').removeClass('is-invalid');
			}
			if (pimpinan_pengunjung == "") {
				$('#pimpinan_pengunjung').addClass('is-invalid');
			} else {
				$('#pimpinan_pengunjung').removeClass('is-invalid');
			}
			if (no_surat == "") {
				$('#no_surat').addClass('is-invalid');
			} else {
				$('#no_surat').removeClass('is-invalid');
			}
			if (surat_kepada == "") {
				$('#surat_kepada').addClass('is-invalid');
			} else {
				$('#surat_kepada').removeClass('is-invalid');
			}


			if (nama_pemohon && nama_instansi && telepon_pemohon && email && id_provinsi && id_kota && id_unit && tgl_kunjungan && topik && jumlah_peserta && pimpinan_pengunjung && no_surat && surat_kepada && file_surat) {
				$.ajax({
					url: "<?= site_url('Home/insert_data'); ?>",
					type: "POST",
					data: ajaxData,
					contentType: false,
					cache: false,
					processData: false,
					dataType: "json",
					success: function(response) {
						if (response.sukses) {
							Swal.fire({
								title: 'Berhasil',
								html: response.sukses,
								icon: 'success',
								showConfirmButton: true,
							}).then((result) => {
								if (result.value) {
									window.location.href = "<?= base_url('/status') ?>";
								}
							});
						} else {
                            Swal.fire({
                                icon: "error",
                                title: "Gagal Memproses",
                                html: response.error,
                            });
                        }
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
					},
				});
			}
		});
	});

</script>
