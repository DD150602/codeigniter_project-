<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pantalla principal</title>
  <link rel="stylesheet" href="<?php echo base_url('resources/'); ?>Css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/d4e9adfcc4.js" crossorigin="anonymous"></script>
</head>
<style>
  body {
    margin: 0;
    padding: 0;
    padding-top: 56px;
    box-sizing: border-box;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Bienvenido</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      </div>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://via.placeholder.com/40" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong><?php echo $this->session->userdata('username'); ?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow dropdown-menu-end" aria-labelledby="dropdownUser1">
          <li><button type="button" class="dropdown-item btn" mary" data-bs-toggle="modal" data-bs-target="#UpdateUserInfo">Configuracion de Cuenta</button></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><?php echo anchor('Login/logout', 'Cerrar Sesion', array('class' => 'dropdown-item')); ?></li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container-fluid d-flex p-1 gap-3">
    <section class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 250px;">
      <span class="fs-4">Tus proyectos</span>
      <hr>
      <button class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none btn" data-bs-toggle="modal" data-bs-target="#createProject">
        <span style="font-size: 1.2em;">
          <i class="fa-solid fa-plus"></i>
        </span>
        <span class="fs-4">Agregar un nuevo Proyecto</span>
      </button>
      <hr>
      <span class="fs-4">Proyectos favoritos:</span>
      <br>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link link-dark">
            Project 1
          </a>
        </li>
      </ul>
    </section>
    <section class="border w-100 rounded-4 p-3 row-gap-1 row">
      <?php if (!empty($projects)): ?>
        <?php foreach ($projects as $project): ?>
          <article class="container col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $project->project_name; ?></h5>
                <p class="card-text"><?php echo $project->project_description; ?></p>
                <p class="card-text">Proyecto creado en: <?php echo $project->project_init_date; ?></p>
                <a href="<?php echo base_url('Project/' . $project->project_id); ?>" class="btn btn-primary">Go to project</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      <?php else: ?>
        <article class="container col">
          <div class="alert alert-warning" role="alert">
            No hay proyectos
          </div>
        </article>
      <?php endif; ?>
    </section>
  </main>

  <!-- Modal to create a new Project -->
  <div class="modal fade" id="createProject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="w-100 d-flex justify-content-center position-relative">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Crear un nuevo proyecto</h1>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo form_open('Projects/createProject'); ?>
          <div class="mb-3">
            <label for="project_name" class="form-label">Nombre del proyecto</label>
            <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Escribe el nombre del proyecto">
          </div>
          <div class="mb-3">
            <label for="project_description" class="form-label">Descripcion del proyecto (Opcional)</label>
            <textarea class="form-control" id="project_description" name="project_description" rows="3" placeholder="Escribe una descripcion para el proyecto"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Crear Proyecto</button>
          <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal to update user info -->
  <div class="modal fade" id="UpdateUserInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="w-100 d-flex justify-content-center position-relative">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Actualiza tus datos</h1>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column">
          <div>
            <form id="user_info_update" action="">
              <div class="row">
                <div class="mb-3 col-6">
                  <label for="user_name" class="form-label">Nombre</label>
                  <input type="password" class="form-control" id="user_name" placeholder="Nombre">
                </div>
                <div class="mb-3 col-6">
                  <label for="user_lastname" class="form-label">Apellidos</label>
                  <input type="password" class="form-control" id="user_lastname" placeholder="Apellidos">
                </div>
                <div class="mb-3 col-6">
                  <label for="user_username" class="form-label">Username</label>
                  <input type="password" class="form-control" id="user_username" placeholder="Username">
                </div>
                <div class="mb-3 col-6">
                  <label for="user_email" class="form-label">Correo electronico</label>
                  <input type="email" class="form-control" id="user_email" placeholder="Nombre@ejemplo.com">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                  <input class="btn btn-primary" type="submit" value="Actualizar informacion">
                </div>
            </form>
          </div>
          <form id="user_password_change">
            <div class="row">
              <div class="mb-3 col-6">
                <label for="Old_password" class="form-label">Contraseña anterior</label>
                <input type="email" class="form-control" id="Old_password" placeholder="Tu antigua contraseña">
              </div>
              <div class="mb-3 col-6">
                <label for="user_password" class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" id="user_password" placeholder="Nueva contraseña">
              </div>
              <div class="mb-3 col-6">
                <label for="user_password_confirm" class="form-label">Confirma tu contraseña</label>
                <input type="password" class="form-control" id="user_password_confirm" placeholder="Confirma tu nueva contraseña">
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
              <input class="btn btn-primary" type="submit" value="Actualizar contraseña">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url('resources/'); ?>JS/popper.min.js"></script>
  <script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
</body>

</html>