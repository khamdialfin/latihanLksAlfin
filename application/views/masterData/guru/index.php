<div class="card">
	<div class="p-2 d-flex justify-content-between border">
		<h4 class="h5">Data Guru</h4>
		<div>
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambahguru"
				id="tomboltambahguru"><i class="fas fa-plus"></i>Tambah Guru</button>
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
				<?php foreach ($guru as $row) : ?>
					<tr class="text-center">
						<td> <?= $row->nama ?> </td>
						<td> <?= $row->no_telp ?> </td>
						<td> <?= $row->alamat ?> </td>
						<td> <?= $row->pengampu ?> </td>
						<td>
							<button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="modaltambahguru">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- /.isi modal disini -->
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->