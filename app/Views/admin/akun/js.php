<script type="text/javascript">

	function _btnEdit(id) {
		$.ajax({
			url: "<?= site_url('Akun/get_edit') ?>",
			type: 'GET',
			dataType: "JSON",
			data: {
				id: id
			},
			success: function(data) {
				$.ajax({
					url: "<?= site_url('Akun/form') ?>",
					success: function(response) {
						$('#formData').html(response);
						$('#viewData').delay(100).fadeIn();
						$('#formData').removeClass('d-none');
					}
				})
			}
		});
	}

	function _update(id) {
		var nama 			= $("#nama").val();
		var jenis_kelamin 	= $("#jenis_kelamin").val();
		var telepon 		= $("#telepon").val();
		var email 			= $("#email").val();
		var alamat 			= $("#alamat").val();

		if (nama == "") {
			$("#nama").focus();
			$('#nama').addClass('is-invalid');
		} else {
			$('#nama').removeClass('is-invalid');
		}
		if (jenis_kelamin == "") {
			$("#jenis_kelamin + span").addClass("is-invalid");
			$("#jenis_kelamin + span").focus(function() {
				$(this).addClass("is-invalid");
			});
		} else {
			$('#jenis_kelamin').removeClass('is-invalid');
			$("#jenis_kelamin + span").removeClass("is-invalid");
			$("#jenis_kelamin + span").focus(function() {
				$(this).removeClass("is-invalid");
			});
		}
		if (telepon == "") {
			$("#telepon").focus();
			$('#telepon').addClass('is-invalid');
		} else {
			$('#telepon').removeClass('is-invalid');
		}
		if (email == "") {
			$("#email").focus();
			$('#email').addClass('is-invalid');
		} else {
			$('#email').removeClass('is-invalid');
		}
		if (confirm(`Yakin data akan disimpan? `)) {
			$.ajax({
				url: "<?= site_url('Akun/update_data') ?>",
				data: new FormData($('#form')[0]),
				type: "POST",
				dataType: 'JSON',
				contentType: false,
				processData: false,
				success: function(response) {
					if (response.status) {
						toastr.success(`data berhasil disimpan`);
						$('#formData').html(response);
						$('#viewData').delay(100).fadeIn();
						$('#formData').removeClass('d-none');
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Data wajib diisi');
				}
			});
		}
	}
</script>
