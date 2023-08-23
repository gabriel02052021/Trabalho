<section class="content-header">
	<h1>
		Permissões
	</h1>
</section>

<section class="content container-fluid"> 
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Grupo de Permissões</h3>
			<div class="box-tools">
				<a href="<?php echo BASE_URL.'permissions/items'; ?>" class="btn btn-primary">Itens de permissões</a>
				<a href="<?php echo BASE_URL.'permissions/add'; ?>" class="btn btn-success">Adicionar</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table">
				<tr>
					<th>Nome da permissão</th>
					<th width="150">Usuários ativos</th>
					<th width="100">Ações</th>
				</tr>

				<?php foreach ($list as $item): ?> 
					<tr>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $item['total_users']; ?></td>
						<td>
							<div class="btn-group">
								<a href="<?php echo BASE_URL.'permissions/edit/'.$item['id']; ?>" class="btn btn-primary btn-xs">Editar</a>
								<a href="<?php echo BASE_URL.'permissions/del/'.$item['id']; ?>" class="btn btn-danger btn-xs <?php echo ($item['total_users'] != '0')?'disabled':''; ?>">Excluir</a>
							</div>
						</td>
					</tr>

				<?php endforeach; ?>

			</table>	
		</div>
	</div>		
</section>