<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login || SMS</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('adminlte') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="<?= base_url() ?>" class="h1"><b>SMS</b> Sekolah</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<?php if ($this->session->flashdata('error')): ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<i class="icon fas fa-ban"></i>
						<?= htmlspecialchars($this->session->flashdata('error')) ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<i class="icon fas fa-check"></i>
						<?= htmlspecialchars($this->session->flashdata('success')) ?>
					</div>
				<?php endif; ?>

				<?php
				// Tampilkan form validation errors
				$validation_errors = validation_errors();
				if (!empty($validation_errors)): ?>
					<div class="alert alert-danger">
						<?= $validation_errors ?>
					</div>
				<?php endif; ?>

				<form action="<?= base_url('auth/login') ?>" method="post">
					<?php
					// CSRF Protection
					echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
					?>

					<div class="input-group mb-3">
						<input type="text" name="username"
							class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>"
							placeholder="Username" value="<?= set_value('username') ?>" required autofocus>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
						<?php if (form_error('username')): ?>
							<div class="invalid-feedback">
								<?= form_error('username') ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="input-group mb-3">
						<input type="password" name="password"
							class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>"
							placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
						<?php if (form_error('password')): ?>
							<div class="invalid-feedback">
								<?= form_error('password') ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember" name="remember"
									<?= set_checkbox('remember', '1') ?> value="1">
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">
								<i class="fas fa-sign-in-alt"></i> Login
							</button>
						</div>
					</div>
				</form>


				<div class="social-auth-links text-center mt-2 mb-3">
					<a href="<?= base_url('auth/register') ?>" class="btn btn-block btn-danger">
						<i class="fas fa-user-plus mr-2"></i> Register
					</a>
				</div>

				<p class="mb-1">
					<a href="<?= base_url('auth/forgot_password') ?>">
						<i class="fas fa-key mr-1"></i> I forgot my password
					</a>
				</p>

			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<p class="text-center mb-0">
					<small>&copy; <?= date('Y') ?> SMS Sekolah. All rights reserved.</small>
				</p>
			</div>
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url('adminlte') ?>/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('adminlte') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>