<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('resources/'); ?>Css/bootstrap.min.css">
</head>

<body>
	<div class="container d-flex justify-content-center align-items-center min-vh-100">
		<div class="w-100 p-3 border rounded" style="max-width: 500px;">
			<h2 class="text-center mb-3">Bienvenido</h2>
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<h5><?php echo $this->session->flashdata('success'); ?></h5>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-warning" role="alert">
					<h5><?php echo $this->session->flashdata('error'); ?></h5>
				</div>
			<?php endif; ?>
			<?php echo form_open('Login'); ?>
			<div class="mb-3">
				<label for="user_email" class="form-label">Correo:</label>
				<input type="email" class="form-control" id="user_email" name="user_email" placeholder="nombre@ejemplo.com">
			</div>
			<div class="mb-3">
				<label for="user_password" class="form-label">Contraseña:</label>
				<input type="password" class="form-control" id="user_password" name="user_password" placeholder="Tu Contraseña">
			</div>
			<div class="mb-3 d-flex justify-content-between align-items-center gap-3">
				<a href="register">Crear cuenta</a>
				<input class="btn btn-primary" type="submit" value="Iniciar sesión">
				<a href="#">¿Olvidaste tu contraseña?</a>
			</div>
			<php echo form_close(); ?>
		</div>
	</div>
	<script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
</body>

</html>