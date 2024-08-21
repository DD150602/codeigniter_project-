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
  <?php if ($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100 p-3 border rounded" style="max-width: 500px;">
      <h2 class="text-center mb-3">Create Account</h2>
      <?php echo form_open('CreateAccount/createAccount'); ?>
      <div class="row">
        <div class="mb-3 col-6">
          <label for="user_name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Tu nombre">
        </div>
        <div class="mb-3 col-6">
          <label for="user_lastname" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Tus apellidos">
        </div>
        <div class="mb-3 col-6">
          <label for="user_username" class="form-label">username</label>
          <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Tu Username">
        </div>
        <div class="mb-3 col-6">
          <label for="user_email" class="form-label">Correo electronico</label>
          <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Nombre@ejemplo.com">
        </div>
        <div class="mb-3 col-6">
          <label for="user_password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Tu Contraseña">
        </div>
        <div class="mb-3 col-6">
          <label for="user_password_confirm" class="form-label">Confirma tu contraseña</label>
          <input type="password" class="form-control" id="user_password_confirm" name="user_password_confirm" placeholder="Confirma tu Contraseña">
        </div>
        <div class="mb-3">
          <label for="roleSelect" class="form-label">Selecciona tu rol</label>
          <select class="form-select" id="role_id" name="role_id" aria-label="Select a role">
            <option selected disabled>Selecciona tu rol</option>
            <option value="2">Project Manager</option>
            <option value="3">Developer</option>
          </select>
        </div>
      </div>
      <div class="mb-3 d-flex justify-content-center">
        <input class="btn btn-primary" type="submit" value="Crear cuenta">
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
</body>

</html>