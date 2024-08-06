<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
      <a class="navbar-brand" href="#">Project 1</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      </div>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://via.placeholder.com/40" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>User</strong>
        </a>
        <ul class="dropdown-menu text-small shadow dropdown-menu-end" aria-labelledby="dropdownUser1">
          <li><button type="button" class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#UserInfoModal">Profile Settings</button></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container-fluid d-flex p-1 gap-3">
    <section class="d-flex flex-column flex-shrink-0 p-3 bg-light h-75" style="width: 250px;">
      <span class="fs-4">Project 1</span>
      <hr>
      <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span style="font-size: 1.2em;">
          <i class="fa-solid fa-plus"></i>
        </span>
        <span class="fs-4">Add a new Task</span>
      </a>
      <div class="overflow-scroll h-50" style="max-height: 400px; overflow: hidden;">
      <hr>
      <span class="fs-4">Not Complited Tasks</span>
      <br>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link link-dark">
            task 1
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            task 2
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            task 3
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            task 4
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            task 5
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
      <article class="container col">
        <div class="card" style="width: 18rem;">
          <img src="https://cdn.wallpapersafari.com/30/96/yQWvgL.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">task 1</h5>
            <div class=" d-flex gap-2">
              <span style="font-size: 1.2em;">
                <i class="fa-solid fa-user"></i>
              </span>
              <span style="font-size: 1.2em;">
                <i class="fa-solid fa-user"></i>
              </span>
            </div>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary me-2">Open Task</a>
          </div>
        </div>
      </article>
      <article class="container col">
        <div class="card" style="width: 18rem;">
          <img src="https://cdn.wallpapersafari.com/30/96/yQWvgL.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">task 2</h5>
            <div class=" d-flex gap-2">
              <span style="font-size: 1.2em;">
                <i class="fa-solid fa-user"></i>
              </span>
              <span style="font-size: 1.2em;">
                <i class="fa-solid fa-user"></i>
              </span>
            </div>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary me-2">Open Task</a>
          </div>
        </div>
      </article>
      <article class="container col">
        <div class="card" style="width: 18rem;">
          <img src="https://cdn.wallpapersafari.com/30/96/yQWvgL.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">task 3</h5>
            <div class=" d-flex gap-2">
              <span style="font-size: 1.2em;">
                <i class="fa-solid fa-user"></i>
              </span>
              <span style="font-size: 1.2em;">
                <i class="fa-solid fa-user"></i>
              </span>
            </div>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary me-2">Open Task</a>
          </div>
        </div>
      </article>
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
          <form>
            <div class="mb-3">
              <label for="projectName" class="form-label">Nombre del Proyecto</label>
              <input type="text" class="form-control" id="projectName" placeholder="Ingrese el nombre del proyecto">
            </div>
            <div class="mb-3">
              <label for="projectDescription" class="form-label">Descripción</label>
              <textarea class="form-control" id="projectDescription" rows="3" placeholder="Ingrese la descripción del proyecto"></textarea>
            </div>
            <div class="mb-3">
              <label for="creationDate" class="form-label">Fecha de Creación</label>
              <input type="date" class="form-control" id="creationDate" disabled>
            </div>
            <div class="mb-3">
              <label for="endDate" class="form-label">Fecha de Finalización</label>
              <input type="date" class="form-control" id="endDate">
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="projectCompleted">
              <label class="form-check-label" for="projectCompleted">Proyecto Finalizado</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Update User Info</h1>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column">
          <div>
            <form id="user_info_update" action="">
              <div class="row">
                <div class="mb-3 col-6">
                  <label for="user_name" class="form-label">Name</label>
                  <input type="password" class="form-control" id="user_name" placeholder="Name">
                </div>
                <div class="mb-3 col-6">
                  <label for="user_lastname" class="form-label">Lastname</label>
                  <input type="password" class="form-control" id="user_lastname" placeholder="Lastname">
                </div>
                <div class="mb-3 col-6">
                  <label for="user_username" class="form-label">username</label>
                  <input type="password" class="form-control" id="user_username" placeholder="Username">
                </div>
                <div class="mb-3 col-6">
                  <label for="user_email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="user_email" placeholder="name@example.com">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                  <input class="btn btn-primary" type="submit" value="Update information">
                </div>
            </form>
          </div>
          <form id="user_password_change">
            <div class="row">
              <div class="mb-3 col-6">
                <label for="Old_password" class="form-label">Old password</label>
                <input type="email" class="form-control" id="Old_password" placeholder="Your old Password">
              </div>
              <div class="mb-3 col-6">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" placeholder="New Password">
              </div>
              <div class="mb-3 col-6">
                <label for="user_password_confirm" class="form-label">Confirm your Password</label>
                <input type="password" class="form-control" id="user_password_confirm" placeholder="Confirm new Password">
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
              <input class="btn btn-primary" type="submit" value="Update password">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('resources/'); ?>JS/popper.min.js"></script>
  <script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
</body>

</html>