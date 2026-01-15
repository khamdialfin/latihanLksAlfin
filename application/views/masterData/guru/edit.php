<div class="modal-header">
    <h4 class="modal-title">Edit Guru</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<form id="formEditGuru">
    <input type="hidden" name="id_guru" value="<?= $guru->id_guru ?>">
    <div class="modal-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $guru->nama ?>">
        </div>
        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telp" class="form-control" value="<?= $guru->no_telp ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $guru->alamat ?></textarea>
        </div>
        <div class="form-group">
            <label>Guru Pengampu</label>
            <input type="text" name="pengampu" class="form-control" value="<?= $guru->pengampu ?>">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" id="updateGuru">Update</button>
    </div>
</form>
