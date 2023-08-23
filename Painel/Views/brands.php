<section class="content-header">
	<h1>
		Marcas
	</h1>
</section>

<section class="content container-fluid"> 
	<div class="box">
		<div class="box-header">

			<div class="box-tools">
				<a href="<?php echo BASE_URL.'brands/add'; ?>" class="btn btn-success">Adicionar</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table">
				<tr>
					<th>Nome da marca</th>
					<th>Qtd produtos</th>
					<th width="100">Ações</th>
				</tr>
				<?php foreach($list as $item): ?>
				<tr>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['product_count']; ?></td>
				<td>
				<div class="btn-group">
								<a href="<?php echo BASE_URL.'brands/edit/'.$item['id']; ?>" class="btn btn-primary btn-xs">Editar</a>
								<a href="<?php echo BASE_URL.'brands/del/'.$item['id']; ?>" class="btn btn-danger btn-xs <?php echo ($item['product_count'] != '0')?'disabled':''; ?>">Excluir</a>
							</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>	
		</div>
	</div>		
	
</section>