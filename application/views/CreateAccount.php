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
      <h2 class="text-center mb-3">Create Account</h2>
      <form>
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
          <div class="mb-3 col-6">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" class="form-control" id="user_password" placeholder="Password">
          </div>
          <div class="mb-3 col-6">
            <label for="user_password_confirm" class="form-label">Confirm your Password</label>
            <input type="password" class="form-control" id="user_password_confirm" placeholder="confirmPassword">
          </div>
        </div>
        <div class="mb-3 d-flex justify-content-center">
          <input class="btn btn-primary" type="submit" value="Create Acount">
        </div>
      </form>
    </div>
  </div>
  <script src="<?php echo base_url('resources/'); ?>JS/bootstrap.min.js"></script>
</body>

</html>