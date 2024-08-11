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
			<h2 class="text-center mb-3">Establece una nueva contraseña</h2>
			<form>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Nueva contraseña</label>
					<input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Tu nueva contraseña">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlPassword1" class="form-label">Confirma tu nueva contraseña</label>
					<input type="password" class="form-control" id="exampleFormControlPassword1" placeholder="confirma tu nueva contraseña">
				</div>
				<div class="mb-3 d-flex justify-content-center">
					<input class="btn btn-primary" type="submit" value="Actualiar contraseña">
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
</body>

</html>