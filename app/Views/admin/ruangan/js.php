<script type="text/javascript">
	var method;
	var url;
	$(function() {
		_getRuangan();
	});

	function _getRuangan() {
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
				"targets": [0, 2, 3, 4],
				"orderable": false
			}, ],
			"columns": [{
					"data": "no"
				},
				{
					"data": "col1"
				},
				{
					"data": "col2"
				},
				{
					"data": "col3"
				},
				{
					"data": "action"
				},
			],
			"ajax": "<?= site_url('Ruangan/getData') ?>",
		});
	}

	function _btnDelete(id, kode_ruangan, nama_ruangan) {
		if (confirm(`Apakah Anda Yakin Hapus Data ${nama_ruangan} ?`)) {
			$.ajax({
				url: "<?= site_url('Ruangan/del_data') ?>",
				type: "POST",
				data: {
					id: id
				},
				dataType: "JSON",
				success: function(response) {
					if (response.sukses) {
						toastr.error(`anda telah menghapus data <b>${nama_ruangan}</b>`);
						$('#viewTable').DataTable().ajax.reload();
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				},
			});
		}
	}

	function _tambahData() {
		method = 'save';
		$('.select2').select2();
		$('#modal-form').modal('show');
		$('#modal-title').text('Tambah Data');
	}

	function _simpanData() {
		if (method == "save") {
			url = "<?= site_url('Ruangan/insert_data') ?>";
		} else {
			url = "<?= site_url('Ruangan/update_data') ?>";
		}
		var kode_ruangan = $("#kode_ruangan").val();
		var nama_ruangan = $("#nama_ruangan").val();
		var keterangan 	 = $("#keterangan").val();

		if (kode_ruangan == "") {
			$("#kode_ruangan").focus();
			$('#kode_ruangan').addClass('is-invalid');
		} else {
			$('#kode_ruangan').removeClass('is-invalid');
		}
		if (nama_ruangan == "") {
			$("#nama_ruangan").focus();
			$('#nama_ruangan').addClass('is-invalid');
		} else {
			$('#nama_ruangan').removeClass('is-invalid');
		}
		if (keterangan == "") {
			$("#keterangan").focus();
			$('#keterangan').addClass('is-invalid');
		} else {
			$('#keterangan').removeClass('is-invalid');
		}
		if (confirm(`Yakin data akan disimpan?`)) {
			$.ajax({
				url: url,
				type: "POST",
				data: new FormData($('#form')[0]),
				dataType: 'JSON',
				contentType: false,
				processData: false,
				success: function(data) {
					if (data.status) {
						toastr.success(`data berhasil disimpan`);
						$('#modal-form').modal('hide');
						$('.form-data')[0].reset();
						$('#viewTable').DataTable().ajax.reload();
					}
					if (data.kode) {
						toastr.error(`kode unit: <b>${kode_ruangan}</b> sudah ada, silakan coba yang lain`);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Data wajib diisi');
				}
			});
		}
	}

	function _btnEdit(id, kode_ruangan, nama_ruangan) {
		method = "edit";
		$.ajax({
			url: "<?= site_url('Ruangan/get_edit') ?>",
			type: 'GET',
			dataType: "JSON",
			data: {
				id: id
			},
			success: function(data) {
					$('[name=id]').val(data.id),
					$('[name=kode_ruangan]').val(data.kode_ruangan),
					$('[name=nama_ruangan]').val(data.nama_ruangan),
					$('[name=keterangan]').val(data.keterangan),
					$('.select2').select2();
					$('#modal-form').modal('show');
					$('#modal-title').text('Ubah Data');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error');
			}
		});
	}
</script>
