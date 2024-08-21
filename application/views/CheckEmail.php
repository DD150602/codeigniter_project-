<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check your email</title>
  <link rel="stylesheet" href="<?php echo base_url('resources/'); ?>Css/bootstrap.min.css">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100 p-3 border rounded" style="max-width: 500px;">
      <?php if ($this->session->flashdata('checked')): ?>
        <div class="alert alert-success" role="alert">
          <h5><?php echo $this->session->flashdata('checked'); ?></h5>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-warning" role="alert">
          <h5><?php echo $this->session->flashdata('error'); ?></h5>
        </div>
      <?php endif; ?>

      <h2 class="text-center mb-3">Verifica tu correo</h2>
      <?php echo form_open('RecoverPassword/index'); ?>
      <div class="mb-3">
        <label for="user_email" class="form-label">Escribe el correo que tienes registrado e la plataforma</label>
        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Tu Correo" required>
      </div>
      <div class="mb-3 d-flex justify-content-center">
        <input class="btn btn-primary" type="submit" value="Enviar correo">
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
</body>

</html>