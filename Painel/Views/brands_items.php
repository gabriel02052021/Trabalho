<?php foreach($itens as $item): ?> 
<tr>
	<td><?php
	for($q=0; $q<$level;$q++);
	echo $item['brand_name']; 
	?></td>
	<td>
		<div class="btn-group">
			<a href="<?php echo BASE_URL.'brands/edit/'.$item['id']; ?>" class="btn btn-primary btn-xs">Editar</a>
			<a href="<?php echo BASE_URL.'brands/del/'.$item['id']; ?>" class="btn btn-danger btn-xs">Excluir</a>
		</div>
	</td>
</tr>


<?php endforeach; ?>