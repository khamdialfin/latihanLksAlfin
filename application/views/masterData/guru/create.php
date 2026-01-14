<?php
$is_edit = isset($edit) && !empty($edit);
?>

<div class="modal fade <?= $is_edit ? 'show' : '' ?>" id="modaltambahguru"
    <?= $is_edit ? 'style="display:block; background:rgba(0,0,0,.5);"' : '' ?>>

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">
                    <?= $is_edit ? 'Edit Guru' : 'Tambah Guru' ?>
                </h4>
                <a href="<?= site_url('guru') ?>" class="close">&times;</a>
            </div>

            <form method="POST" action="<?= site_url('guru/save') ?>">
                <div class="modal-body">

                    <?php if ($is_edit): ?>
                    <input type="hidden" name="id_guru" value="<?= $edit->id_guru ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= $is_edit ? $edit->nama : '' ?>">
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_telp" class="form-control"
                            value="<?= $is_edit ? $edit->no_telp : '' ?>">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"><?= $is_edit ? $edit->alamat : '' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Guru Pengampu</label>
                        <input type="text" name="pengampu" class="form-control"
                            value="<?= $is_edit ? $edit->pengampu : '' ?>">
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="<?= site_url('guru') ?>" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <?= $is_edit ? 'Update' : 'Simpan' ?>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
