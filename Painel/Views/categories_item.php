<?php foreach($itens as $item): ?> 
<tr>
	<td><?php
	for($q=0; $q<$level;$q++) echo'-- ';
	echo $item['name']; 
	?></td>
	<td>
		<div class="btn-group">
			<a href="<?php echo BASE_URL.'categories/edit/'.$item['id']; ?>" class="btn btn-primary btn-xs">Editar</a>
			<a href="<?php echo BASE_URL.'categories/del/'.$item['id']; ?>" class="btn btn-danger btn-xs">Excluir</a>
		</div>
	</td>
</tr>

<?php 
	if(count($item['sub']) > 0){
		$this->loadView('categories_item', array(
			'itens' => $item['sub'],
			'level' => $level + 1
		));
	}
?>

<?php endforeach; ?>