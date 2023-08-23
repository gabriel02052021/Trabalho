<?php foreach($list as $widget_item): ?>

<div class="widget_body">
	<div class="widget_item">
		<a href="<?php echo BASE_URL; ?>product/open/<?php echo $widget_item['id']; ?>">
		<div class="widget_info">
			<div class="widget_product_name"><?php echo $widget_item['Name']; ?> </div>
			<div class="widget_price"><span><?php echo number_format($widget_item['price_sec'], 2, ',', '.'); ?></span><?php echo number_format($widget_item['price'], 2, ',', '.'); ?></div>
			  					</div>
			  				</div>
			  				<div class="widget_photo">
			  					<img src="<?php echo BASE_URL; ?>media/products/<?php echo $widget_item['images'][0]['url']; ?>" width="100%">
			  				</div>
			  				<div style="clear:both;"></div>
			  			</div>
<?php endforeach; ?>