

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Diamond Imports | Log in</title>

 <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Diamond</b>Imports</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Entre para iniciar sua sessão</p>

      <form action="<?php echo BASE_URL; ?>login/index_action" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Esqueci minha senha</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo BASE_URL.'users/add'; ?>" class="text-center">Registre-se</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL; ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
