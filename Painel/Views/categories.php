<section class="content-header">
	<h1>
		Categorias
	</h1>
</section>

<section class="content container-fluid"> 
	<div class="box">
		<div class="box-header">

			<div class="box-tools">
				<a href="<?php echo BASE_URL.'categories/add'; ?>" class="btn btn-success">Adicionar</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table">
				<tr>
					<th>Nome da Categoria</th>
					<th width="100">Ações</th>
				</tr>

				<?php $this->loadView('categories_item', array(
					'itens' => $list,
					'level' => 0
				)); ?>

			</table>	
		</div>
	</div>		
	
</section>