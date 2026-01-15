</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
	<div class="p-3">
		<h5>Title</h5>
		<p>Sidebar content</p>
	</div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		Anything you want
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
	reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminlte/') ?>dist/js/adminlte.min.js"></script>

<!-- DataTables & Plugins -->
<script src="<?= base_url('adminlte') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('adminlte') ?>/plugins/toastr/toastr.min.js"></script>

<!-- Initialize Toastr -->
<script>
	// Pastikan jQuery sudah dimuat
	if (typeof jQuery === 'undefined') {
		console.error('jQuery is not loaded!');
		document.write('<script src="https://code.jquery.com/jquery-3.6.0.min.js"><\/script>');
	}

	toastr.options = {
		"closeButton": true,
		"debug": false,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
</script>

<!-- Page specific script -->
<script>
	$(document).ready(function() {
		if ($("#example1").length) {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "excel", "pdf", "print"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		}
	});
</script>

<script>
	var base_url = '<?= base_url() ?>';
</script>

<!-- Guru JavaScript Functions -->
<script>
	$(document).ready(function() {
		// Fungsi untuk menampilkan modal edit guru
		window.editGuru = function(id) {
			console.log('Edit guru ID:', id);
			$('#modalEditGuru').modal('show');

			// Load form edit via AJAX
			$('#modalEditGuru .modal-content').html(
				'<div class="text-center p-5"><i class="fas fa-spinner fa-spin fa-2x"></i></div>');

			$.ajax({
				url: base_url + 'guru/edit/' + id,
				type: 'GET',
				success: function(response) {
					$('#modalEditGuru .modal-content').html(response);
				},
				error: function(xhr, status, error) {
					console.error('Error loading edit form:', error);
					$('#modalEditGuru .modal-content').html(
						'<div class="modal-header">' +
						'<h4 class="modal-title">Error</h4>' +
						'<button type="button" class="close" data-dismiss="modal">&times;</button>' +
						'</div>' +
						'<div class="modal-body">' +
						'<p class="text-danger">Gagal memuat form edit. Status: ' + xhr.status +
						'</p>' +
						'<p>URL: ' + base_url + 'guru/edit/' + id + '</p>' +
						'</div>'
					);
				}
			});
		};

		// Fungsi untuk menghapus guru
		window.hapusGuru = function(id) {
			console.log('Hapus guru ID:', id);

			Swal.fire({
				title: 'Apakah Anda yakin?',
				text: "Data yang dihapus tidak dapat dikembalikan!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Ya, hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: base_url + 'guru/destroy/' + id,
						type: 'POST',
						dataType: 'json',
						success: function(response) {
							console.log('Delete response:', response);
							if (response.status == 'success') {
								Swal.fire(
									'Terhapus!',
									response.message,
									'success'
								).then(() => {
									location.reload();
								});
							} else {
								Swal.fire(
									'Error!',
									response.message || 'Gagal menghapus data',
									'error'
								);
							}
						},
						error: function(xhr, status, error) {
							console.error('Delete error:', error, xhr.responseText);
							Swal.fire(
								'Error!',
								'Terjadi kesalahan saat menghapus data. Status: ' + xhr
								.status,
								'error'
							);
						}
					});
				}
			});
		};

		// Load modal tambah guru saat ditampilkan
		$('#modalTambahGuru').on('show.bs.modal', function() {
			var modalContent = $(this).find('.modal-content');
			modalContent.html(
				'<div class="text-center p-5"><i class="fas fa-spinner fa-spin fa-2x"></i></div>');

			$.ajax({
				url: base_url + 'guru/create',
				type: 'GET',
				success: function(response) {
					modalContent.html(response);
				},
				error: function(xhr, status, error) {
					console.error('Error loading create form:', error);
					modalContent.html(
						'<div class="modal-body"><p class="text-danger">Gagal memuat form. Status: ' +
						xhr.status + '</p></div>');
				}
			});
		});

		// Submit form tambah guru dengan AJAX
		$(document).on('submit', '#formTambahGuru', function(e) {
			e.preventDefault();

			// Reset error messages
			$('.is-invalid').removeClass('is-invalid');
			$('.invalid-feedback').remove();

			$.ajax({
				url: base_url + 'guru/store',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
				success: function(response) {
					console.log('Store response:', response);
					if (response.status == 'success') {
						$('#modalTambahGuru').modal('hide');
						toastr.success(response.message);
						setTimeout(function() {
							location.reload();
						}, 1500);
					} else {
						// Tampilkan error validasi
						if (response.messages) {
							$.each(response.messages, function(key, value) {
								$('[name="' + key + '"]').addClass('is-invalid');
								$('[name="' + key + '"]').after(
									'<div class="invalid-feedback">' + value +
									'</div>');
							});
						} else {
							toastr.error(response.message || 'Terjadi kesalahan');
						}
					}
				},
				error: function(xhr, status, error) {
					console.error('Store error:', error, xhr.responseText);
					toastr.error('Terjadi kesalahan saat menyimpan data. Status: ' + xhr
						.status);
				}
			});
		});

		// Submit form edit guru dengan AJAX
		$(document).on('submit', '#formEditGuru', function(e) {
			e.preventDefault();

			// Reset error messages
			$('.is-invalid').removeClass('is-invalid');
			$('.invalid-feedback').remove();

			var formData = $(this).serialize();
			var id = $('[name="id_guru"]', this).val();

			$.ajax({
				url: base_url + 'guru/update/' + id,
				type: 'POST',
				data: formData,
				dataType: 'json',
				success: function(response) {
					console.log('Update response:', response);
					if (response.status == 'success') {
						$('#modalEditGuru').modal('hide');
						toastr.success(response.message);
						setTimeout(function() {
							location.reload();
						}, 1500);
					} else {
						// Tampilkan error validasi
						if (response.messages) {
							$.each(response.messages, function(key, value) {
								$('[name="' + key + '"]').addClass('is-invalid');
								$('[name="' + key + '"]').after(
									'<div class="invalid-feedback">' + value +
									'</div>');
							});
						} else {
							toastr.error(response.message || 'Terjadi kesalahan');
						}
					}
				},
				error: function(xhr, status, error) {
					console.error('Update error:', error, xhr.responseText);
					toastr.error('Terjadi kesalahan saat mengupdate data. Status: ' + xhr
						.status);
				}
			});
		});

		// Hapus validasi error saat user mulai mengetik
		$(document).on('keyup', '.form-control', function() {
			if ($(this).hasClass('is-invalid')) {
				$(this).removeClass('is-invalid');
				$(this).next('.invalid-feedback').remove();
			}
		});

		// Reset form ketika modal ditutup
		$(document).on('hidden.bs.modal', '.modal', function() {
			var form = $(this).find('form')[0];
			if (form) form.reset();
			$(this).find('.is-invalid').removeClass('is-invalid');
			$(this).find('.invalid-feedback').remove();
		});
	});
</script>

</body>

</html>