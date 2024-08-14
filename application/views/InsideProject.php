<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyecto: <?php echo isset($project->project_name) ? $project->project_name : 'Project Not Found'; ?></title>
  <link rel="stylesheet" href="<?php echo base_url('resources/'); ?>Css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('resources/'); ?>Css/sweetalert2.min.css">
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
      <a class="navbar-brand" href="<?php echo site_url('Dashboard'); ?>">Otros Proyectos</a>
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
          <li><button type="button" class="dropdown-item btn" mary" data-bs-toggle="modal" data-bs-target="#UserInfoModal">Configuracion de Cuenta</button></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><?php echo anchor('Login/logout', 'Cerrar Sesion', array('class' => 'dropdown-item')); ?></li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container-fluid d-flex p-1 gap-3">
    <section class="d-flex flex-column flex-shrink-0 p-3 bg-light h-75" style="width: 250px;">
      <span class="fs-4">Proyecto: <?php echo isset($project->project_name) ? $project->project_name : 'Project Not Found'; ?></span>
      <hr>
      <button class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none btn" data-bs-toggle="modal" data-bs-target="#createTask">
        <span style="font-size: 1.2em;">
          <i class="fa-solid fa-plus"></i>
        </span>
        <span class="fs-4">Agregar una nueva tarea</span>
      </button>
      <div class="overflow-scroll h-50" style="max-height: 400px; overflow: hidden;">
        <hr>
        <span class="fs-4">Tareas no completadas</span>
        <br>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link link-dark">
              task 1
            </a>
          </li>
        </ul>
      </div>
      <hr>
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ProjectInfoModal">
        Options
      </button>
    </section>
    <section class="border w-100 rounded-4 p-3 row-gap-1 row">
      <?php if (!empty($tasks)): ?>
        <?php foreach ($tasks as $task): ?>
          <article class="container col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $task->task_name; ?></h5>
                <div class=" d-flex gap-2">
                  <span style="font-size: 1.2em;">
                    <i class="fa-solid fa-user"></i>
                  </span>
                  <span style="font-size: 1.2em;">
                    <i class="fa-solid fa-user"></i>
                  </span>
                </div>
                <p class="card-text"><?php echo $task->task_description; ?></p>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="task_completed_<?php echo $task->task_id; ?>" name="task_completed_<?php echo $task->task_id; ?>" <?php echo $task->task_completed ? 'checked' : ''; ?> disabled>
                  <label class="form-check-label" for="task_completed_<?php echo $task->task_id; ?>">
                    Completed
                  </label>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TaskInfoModal">
                  Mostrar detalles
                </button>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      <?php else: ?>
        <article class="container col">
          <div class="alert alert-warning" role="alert">
            No hay tareas en este proyecto
          </div>
        </article>
      <?php endif; ?>
    </section>
  </main>

  <!-- Modal update project info -->
  <div class="modal fade" id="ProjectInfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ProjectInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ProjectInfoModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h2>Formulario de Proyecto</h2>
          <?php echo form_open('Projects/updateProject') ?>
          <div class="mb-3">
            <label for="project_name" class="form-label">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo isset($project->project_name) ? $project->project_name : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="project_description" class="form-label">Descripción</label>
            <textarea class="form-control" id="project_description" name="project_description" rows="3"><?php echo isset($project->project_description) ? $project->project_description : ''; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="project_init_date" class="form-label">Fecha de Creación</label>
            <input type="date" class="form-control" id="project_init_date" name="project_init_date" value="<?php echo isset($project->project_init_date) ? $project->project_init_date : ''; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="project_finish_date" class="form-label">Fecha de Finalización</label>
            <input type="date" class="form-control" id="project_finish_date" name="project_finish_date" value="<?php echo isset($project->project_finish_date) ? $project->project_finish_date : ''; ?>">
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="project_completed" name="project_completed" <?php echo ($project->project_completed == 1) ? 'checked' : ''; ?>>
            <label class=" form-check-label" for="project_completed">Proyecto Finalizado</label>
          </div>
          <input class="form-control" type="hidden" id="project_id" name="project_id" value="<?php echo isset($project->project_id) ? $project->project_id : 'Project Not Found'; ?>">
          <button type="submit" class="btn btn-primary">Enviar</button>
          <?php echo form_close() ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProjectModal">Eliminar Proyecto</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal to delete the project -->
  <div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="w-100 d-flex justify-content-center position-relative">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Dinos porque eliminas el proyecto</h1>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo form_open('Projects/deleteProject') ?>
          <div class="mb-3 text-center">
            <label for="project_annotation" class="form-label">Estas seguro de que quieres eliminar este proyecto?</label>
            <p>Esta accion no se puede deshacer.</p>
            <textarea class="form-control" id="project_annotation" name="project_annotation" rows="3" placeholder="Escribe el porque" required></textarea>
          </div>
          <input class="form-control" type="hidden" id="project_id" name="project_id" value="<?php echo isset($project->project_id) ? $project->project_id : 'Project Not Found'; ?>">
          <button type="submit" class="btn btn-danger">Delete</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal to create a new task -->
  <div class="modal fade" id="createTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Crea una nueva Tarea</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo form_open('Projects/createTask') ?>
          <div class="mb-3">
            <label for="task_name" class="form-label">Nombre de la tarea</label>
            <input type="text" class="form-control" id="task_name" name="task_name" placeholder="Escribe el nombre de la tarea">
          </div>
          <div class="mb-3">
            <label for="task_description" class="form-label">Descripcion de la Tarea (Opcional)</label>
            <textarea class="form-control" id="task_description" name="task_description" rows="3" placeholder="Escribe una descripcion para la tarea"></textarea>
          </div>
          <input class="form-control" type="hidden" id="project_id" name="project_id" value="<?php echo isset($project->project_id) ? $project->project_id : 'Project Not Found'; ?>">
          <button type="submit" class="btn btn-primary">Crear tarea</button>
          <?php echo form_close() ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal task info -->
  <div class="modal fade" id="TaskInfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="TaskInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="w-100 d-flex justify-content-center position-relative">
            <h1 class="modal-title fs-5" id="TaskInfoModalLabel">Informacion de la Tarea</h1>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-4">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="taskNameInfo" class="form-label">Nombre de la Tarea</label>
                <input type="text" class="form-control" id="taskNameInfo" placeholder="Ingrese el nombre de la tarea">
              </div>
              <div class="mb-3">
                <label for="taskDescriptionInfo" class="form-label">Descripción</label>
                <textarea class="form-control" id="taskDescriptionInfo" rows="3" placeholder="Ingrese la descripción de la tarea"></textarea>
              </div>
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="taskCompleted">
                <label class="form-check-label" for="taskCompleted">Tarea Finalizada</label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="userSelect" class="form-label">Agregar Usuarios</label>
                <div class="input-group">
                  <select class="form-select" id="userSelect">
                    <option selected disabled>Select a user to add</option>
                    <option value="1">User 1</option>
                    <option value="2">User 2</option>
                    <option value="3">User 3</option>
                  </select>
                  <button type="button" class="btn btn-secondary" id="addUserBtn">Añadir</button>
                </div>
              </div>

              <!-- Users List -->
              <div id="userList" class="mb-3">
                <label class="form-label">Usuarios Añadidos:</label>
                <ul class="list-group" id="addedUsers">
                  <!-- Users will be added here -->
                </ul>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalTask">Eliminar Tarea</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal to delete a task -->
  <div class="modal fade" id="deleteModalTask" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="w-100 d-flex justify-content-center position-relative">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Dinos porque eliminas la tarea</h1>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="deleteForm">
            <div class="mb-3 text-center">
              <label for="deleteReason" class="form-label">Estas seguro de que quieres eliminar esta tarea?</label>
              <p>Esta accion no se puede deshacer.</p>
              <textarea class="form-control" id="deleteReason" rows="3" placeholder="Escribe el porque" required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="submitDelete()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal user info -->
  <div class="modal fade" id="UserInfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UserInfoModalLabel" aria-hidden="true">
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
            <?php if ($this->session->flashdata('realization')): ?>
              <div class="alert alert-success" role="alert">
                <h5><?php echo $this->session->flashdata('success'); ?></h5>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-warning" role="alert">
                <h5><?php echo $this->session->flashdata('error'); ?></h5>
              </div>
            <?php endif; ?>
            <?php echo form_open('UserController/updateInfo') ?>
            <div class="row">
              <div class="mb-3 col-6">
                <label for="user_name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nombre">
              </div>
              <div class="mb-3 col-6">
                <label for="user_lastname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Apellidos">
              </div>
              <div class="mb-3 col-6">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Username">
              </div>
              <div class="mb-3 col-6">
                <label for="user_email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Nombre@ejemplo.com">
              </div>
              <div class="mb-3 d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Actualizar informacion">
              </div>
              <?php echo form_close() ?>
            </div>
            <?php echo form_open('UserController/updatePassword') ?>
            <div class="row">
              <div class="mb-3 col-6">
                <label for="Old_password" class="form-label">Contraseña anterior</label>
                <input type="password" class="form-control" id="Old_password" name="Old_password" placeholder="Tu antigua contraseña">
              </div>
              <div class="mb-3 col-6">
                <label for="user_password" class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Nueva contraseña">
              </div>
              <div class="mb-3 col-6">
                <label for="user_password_confirm" class="form-label">Confirma tu contraseña</label>
                <input type="password" class="form-control" id="user_password_confirm" name="user_password_confirm" placeholder="Confirma tu nueva contraseña">
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
              <input class="btn btn-primary" type="submit" value="Actualizar contraseña">
            </div>
            <?php echo form_close() ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url('resources/'); ?>JS/popper.min.js"></script>
    <script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
    <script src="<?php echo base_url('resources/'); ?>JS/sweetalert2.all.min.js"></script>
</body>

</html>