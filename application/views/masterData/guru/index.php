<div class="card">
    <div class="p-2 d-flex justify-content-between border">
        <h4 class="h5">Data Guru</h4>
        <div>
            <!-- Gunakan data-toggle dan data-target untuk modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahGuru">
                <i class="fas fa-plus"></i> Tambah Guru
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" id="example1">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Guru Pengampu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($guru)): ?>
                <?php $no = 1; ?>
                <?php foreach ($guru as $val) : ?>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($val->nama) ?></td>
                    <td><?= htmlspecialchars($val->no_telp) ?></td>
                    <td><?= htmlspecialchars($val->alamat) ?></td>
                    <td><?= htmlspecialchars($val->pengampu) ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <button type="button" onclick="editGuru(<?= $val->id_guru ?>)" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Tombol Hapus -->
                        <button type="button" onclick="hapusGuru(<?= $val->id_guru ?>)" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data guru</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahGuru">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Content akan diisi via AJAX -->
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEditGuru">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Content akan diisi via AJAX -->
        </div>
    </div>
</div>