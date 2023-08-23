<section class="content-header">
	<h1>
		Permissões
	</h1>
</section>

<section class="content container-fluid"> 
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Itens de Permissões</h3>
			<div class="box-tools">
				<a href="<?php echo BASE_URL.'permissions/items_add'; ?>" class="btn btn-success">Adicionar</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table">
				<tr>
					<th>Nome do item de permissão</th>
					<th>Slug</th>
					<th width="100">Ações</th>
				</tr>

				<?php foreach ($list as $item): ?> 
					<tr>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $item['slug']; ?></td>
						<td>
							<div class="btn-group">
								<a href="<?php echo BASE_URL.'permissions/items_edit/'.$item['id']; ?>" class="btn btn-primary btn-xs">Editar</a>
								<a href="<?php echo BASE_URL.'permissions/items_del/'.$item['id']; ?>" class="btn btn-danger btn-xs">Excluir</a>
							</div>
						</td>
					</tr>

				<?php endforeach; ?>

			</table>	
		</div>
	</div>		
</section>