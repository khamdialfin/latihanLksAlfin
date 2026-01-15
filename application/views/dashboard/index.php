<div class="row">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<h3>150</h3>
				<p>Total Siswa</p>
			</div>
			<div class="icon">
				<i class="fas fa-users"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-success">
			<div class="inner">
				<h3>53</h3>
				<p>Total Guru</p>
			</div>
			<div class="icon">
				<i class="fas fa-chalkboard-teacher"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>12</h3>
				<p>Total Kelas</p>
			</div>
			<div class="icon">
				<i class="fas fa-school"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>65</h3>
				<p>Unique Visitors</p>
			</div>
			<div class="icon">
				<i class="fas fa-chart-pie"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Selamat Datang, <?= $nama ?>!</h3>
			</div>
			<div class="card-body">
				<p>Anda login sebagai <strong><?= ucfirst($level) ?></strong></p>
				<p>Selamat datang di Sistem Manajemen Sekolah. Gunakan menu di sidebar untuk mengakses fitur.</p>

				<?php if ($level == 'admin'): ?>
					<div class="alert alert-info">
						<h5><i class="icon fas fa-info"></i> Informasi Admin</h5>
						Sebagai administrator, Anda memiliki akses penuh ke semua fitur sistem.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>