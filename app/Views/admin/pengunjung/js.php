<script type="text/javascript">
	var method;
	var url;
	$(function() {
		_getPengunjung();
	});

	function _getPengunjung() {
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
				"targets": [0, 3, 5, 6],
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
					"data": "action"
				},
			],
			"ajax": "<?= site_url('Pengunjung/getData') ?>",
		});
	}

	function _simpanData() {
		var status = $("#status").val();
		var pesan_status = $("#pesan_status").val();
		if (status == "") {
			$("#status + span").addClass("is-invalid");
			$("#status + span").focus(function() {
				$(this).addClass("is-invalid");
			});
		} else {
			$('#status').removeClass('is-invalid');
			$("#status + span").removeClass("is-invalid");
			$("#status + span").focus(function() {
				$(this).removeClass("is-invalid");
			});
		}
		if (pesan_status == "") {
			$("#pesan_status").focus();
			$('#pesan_status').addClass('is-invalid');
		} else {
			$('#pesan_status').removeClass('is-invalid');
		}
		if (confirm(`Yakin data akan disimpan?`)) {
			$.ajax({
				url: "<?= site_url('Pengunjung/konfir_data') ?>",
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
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Data di konfirmasi');
				}
			});
		}
	}

	function _btnKonfir(id, nama_pemohon, nama_instansi) {
		method = "edit";
		$.ajax({
			url: "<?= site_url('Pengunjung/get_konfir') ?>",
			type: 'GET',
			dataType: "JSON",
			data: {
				id: id
			},
			success: function(data) {
				$('[name=id]').val(data.id),
					$('[name=status]').val(data.status),
					$('[name=pesan_status]').val(data.pesan_status),
					$('.select2').select2();
				$('#modal-form').modal('show');
				$('#modal-title').text('Ubah Data');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error');
			}
		});
	}

	function _btnDelete(id, nama_pemohon, nama_instansi) {
		if (confirm(`Apakah Anda Yakin Hapus Data ${nama_pemohon} ?`)) {
			$.ajax({
				url: "<?= site_url('Pengunjung/del_data') ?>",
				type: "POST",
				data: {
					id: id
				},
				dataType: "JSON",
				success: function(response) {
					if (response.sukses) {
						toastr.error(`anda telah data kunjungan <b>${nama_pemohon}</b>`);
						$('#viewTable').DataTable().ajax.reload();
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				},
			});
		}
	}
</script>
