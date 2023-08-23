<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usuários
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<form method="POST" action="<?php echo BASE_URL; ?>users/add_action">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Novo usuário</h3>
				<div class="box-tools">
					<input type="submit" class="btn btn-success" value="Salvar">
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
				<div class="form-group <?php echo (in_array('permission', $errorItems))?'has-error':''; ?>">
					<label for="form_permission">Nível de Permissão</label><br/>
	           		<select name="permission" class="form-control" id="form_permission">
	                <option></option>
	                <?php foreach($permission_list as $item): ?>
	                	<option <?php echo ($filter['permission']==$item['id'])?'selected':''; ?> value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
	                <?php endforeach; ?>
	                </select>
	            </div>
	         <div  class="form-group">
	         	<label for="users_admin">Administrador</label><br>
	                <input  type="checkbox" name="admin" value="0"> Não<br>
	                <input  type="checkbox" name="admin" value="1"> Sim
	         </div>
			</div>
		</div>
	</form>

</section>
<!-- /.content -->