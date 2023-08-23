<section class="content-header">
	<h1>
		Páginas
	</h1>
</section>

<section class="content container-fluid"> 
	<div class="box">
		<div class="box-header">

			<div class="box-tools">
				<a href="<?php echo BASE_URL.'pages/add'; ?>" class="btn btn-success">Adicionar</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table">
				<tr>
					<th>Nome da página</th>
					<th width="100">Ações</th>
				</tr>
				<?php foreach($list as $item): ?>
					<tr>
						<td><?php echo $item['title']; ?></td>
						<td>
							<div class="btn-group">
								<a href="<?php echo BASE_URL.'pages/edit/'.$item['id']; ?>" class="btn btn-primary btn-xs">Editar</a>
								<a href="<?php echo BASE_URL.'pages/del/'.$item['id']; ?>" class="btn btn-danger btn-xs">Excluir</a>
							</div>
						</td>

					</tr>
				<?php endforeach; ?>

			</table>	
		</div>
	</div>		
	
</section>