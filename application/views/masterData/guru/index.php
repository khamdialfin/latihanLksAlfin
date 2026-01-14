<div class="card">
    <div class="p-2 d-flex justify-content-between border">
        <h4 class="h5">Data Guru</h4>
        <div>
            <a href="#modaltambahguru" class="btn btn-primary btn-sm" data-toggle="modal"><i
                    class="fas fa-plus"></i>Tambah Guru</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" id="example1">
            <thead>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Guru Pengampu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guru as $val) : ?>
                <tr class="text-center">
                    <td> <?= $val->nama ?> </td>
                    <td> <?= $val->no_telp ?> </td>
                    <td> <?= $val->alamat ?> </td>
                    <td> <?= $val->pengampu ?> </td>
                    <td>
                        <a href="?edit=<?= $val->id_guru ?>#modaltambahguru" class="btn btn-warning btn-sm"><i
                                class="fas fa-edit"></i></a>

                        <a href="<?= site_url('guru/destroy/' . $val->id_guru) ?>"
                            onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php $this->load->view('masterData/guru/create'); ?>
    </div>
</div>

<!-- /.modal -->
