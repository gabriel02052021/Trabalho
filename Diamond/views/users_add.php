
<!-- Content Header (Page header) -->
<section class="content-header">
  <header>
  	 <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/AdminLTE/dist/css/adminlte.min.css">
  </header>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<form method="POST" class="adduserform" action="<?php echo BASE_URL; ?>users/add_action">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Novo usuário</h3>
				<div class="box-tools">
					<input type="submit" class="btn btn-success" placeholder="SALVAR" value="Salvar">
				</div>
			</div>
			<div class="box-body">

				<div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':''; ?>">
					<label for="users_name">Nome do usuário</label>
					<input type="text" class="form-control" id="users_name" name="name">
				</div>
				<div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':''; ?>">
					<label for="users_email">Email do usuário</label>
					<input type="text" class="form-control" id="users_email" name="email">
				</div>
				<div class="form-group <?php echo (in_array('password', $errorItems))?'has-error':''; ?>">
					<label for="users_password">Digite a senha</label>
					<input type="password" class="form-control" id="users_email" name="password">
				</div>
				<div class="form-group <?php echo (in_array('password', $errorItems))?'has-error':''; ?>">
					<label for="users_password">Confirme a senha</label>
					<input type="password" class="form-control" id="users_email" name="password">
				</div>
			</div>
		</div>
	</form>


<script src="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL; ?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL; ?>assets/AdminLTE/dist/js/adminlte.min.js"></script>

</section>
<!-- /.content -->