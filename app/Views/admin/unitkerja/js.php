<script type="text/javascript">
	var method;
	var url;
	$(function() {
		_getUnitkerja();
	});

	function _getUnitkerja() {
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
			"ajax": "<?= site_url('Unitkerja/getData') ?>",
		});
	}

	function _btnDelete(id, kode_unit, nama_unit) {
		if (confirm(`Apakah Anda Yakin Hapus Data ${nama_unit} ?`)) {
			$.ajax({
				url: "<?= site_url('Unitkerja/del_data') ?>",
				type: "POST",
				data: {
					id: id
				},
				dataType: "JSON",
				success: function(response) {
					if (response.sukses) {
						toastr.error(`anda telah menghapus akun <b>${nama_unit}</b>`);
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
			url = "<?= site_url('Unitkerja/insert_data') ?>";
		} else {
			url = "<?= site_url('Unitkerja/update_data') ?>";
		}
		var kode_unit = $("#kode_unit").val();
		var nama_unit = $("#nama_unit").val();
		var alamat 	  = $("#alamat").val();

		if (kode_unit == "") {
			$("#kode_unit").focus();
			$('#kode_unit').addClass('is-invalid');
		} else {
			$('#kode_unit').removeClass('is-invalid');
		}
		if (nama_unit == "") {
			$("#nama_unit").focus();
			$('#nama_unit').addClass('is-invalid');
		} else {
			$('#nama_unit').removeClass('is-invalid');
		}
		if (alamat == "") {
			$("#alamat").focus();
			$('#alamat').addClass('is-invalid');
		} else {
			$('#alamat').removeClass('is-invalid');
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
						toastr.error(`kode unit: <b>${kode_unit}</b> sudah ada, silakan coba yang lain`);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Data wajib diisi');
				}
			});
		}
	}

	function _btnEdit(id, kode_unit, nama_unit) {
		method = "edit";
		$.ajax({
			url: "<?= site_url('Unitkerja/get_edit') ?>",
			type: 'GET',
			dataType: "JSON",
			data: {
				id: id
			},
			success: function(data) {
					$('[name=id]').val(data.id),
					$('[name=kode_unit]').val(data.kode_unit),
					$('[name=nama_unit]').val(data.nama_unit),
					$('[name=alamat]').val(data.alamat),
					$('.select2').select2();
					$('#modal-form').modal('show');
					$('#modal-title').text('Ubah Data');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Data wajib diisi');
			}
		});
	}
</script>
