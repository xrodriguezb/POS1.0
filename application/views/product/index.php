<script>
var site_base_url='<?=base_url()?>';
</script>
<script type="text/javascript"
	src="<?php echo base_url();?>js/product/index.js"></script>
<?php
echo heading('Productos', 3);
?>
<a href="<?=base_url() ?>product/add" class="btn btn-info"> <span
	class="glyphicon glyphicon-plus"></span> Agregar Producto
</a>
<p>
<div id="container_product_list">
	<div id="ajax_response"></div>
</div>
