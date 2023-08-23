<?php
if(isset($selected) == false) {
  $selected = '';
}
?>

<?php foreach ($itens as $item): ?> 
	<option <?php echo ($item['id'] == $selected)?'selected="selected":'' ?> value="<?php echo $item['id']; ?>">
	<?php
		for($q=0;$q<$level;$q++) echo'-- ';
		echo $item['name'];
	?></option>

<?php 
	if(count($item['sub']) > 0){
		$this->loadView('categories_item_add', array(
			'itens' => $item['sub'],
			'level' => $level + 1,
			'selected' => $selected
		));
	}
?>

<?php endforeach; ?>
