// Load modal tambah guru
$(document).on('click', '#tomboltambahguru', function(e) {
    e.preventDefault();
    $.ajax({
        url: base_url + 'guru/tambah',
        method: 'GET',
        success: function(response) {
            $('#modaltambahguru .modal-content').html(response);
            $('#modaltambahguru').modal('show');
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Gagal memuat form!'
            });
        }
    });
});

// Submit form tambah guru via AJAX
$(document).on('click', '#saveGuru', function(e) {
    e.preventDefault();

    $.ajax({
        url: base_url + 'guru/store',
        type: 'POST',
        data: $('#formTambahGuru').serialize(),
        dataType: 'json',
        success: function(response) {
            if(response.status === 'success'){
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                });

                // Tutup modal
                $('#modaltambahguru').modal('hide');

                // Update DataTables tanpa reload
                let table = $('#example1').DataTable();
                // Tambahkan row baru
                let rowData = [
                    $('#formTambahGuru input[name="nama"]').val(),
                    $('#formTambahGuru input[name="no_telp"]').val(),
                    $('#formTambahGuru textarea[name="alamat"]').val(),
                    $('#formTambahGuru input[name="pengampu"]').val(),
                    '<button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button> ' +
                    '<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>'
                ];
                table.row.add(rowData).draw();

            } else if(response.status === 'error'){
                let msg = '';
                if(response.messages){
                    for(const key in response.messages){
                        msg += response.messages[key] + '\n';
                    }
                } else {
                    msg = response.message || 'Terjadi kesalahan!';
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: msg
                });
            }
        },
        error: function(){
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim data'
            });
        }
    });
});
