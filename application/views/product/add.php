<script>
var site_base_url='<?=base_url()?>';
</script>
<script type="text/javascript"
	src="<?php echo base_url();?>js/product/add.js"></script>
<?php
echo heading('Nuevo Producto', 3);
?>


<form class="form-horizontal" role="form" id="Producto">
	<div class="form-group">
		<label for="Product.name" class="col-lg-2 control-label">Nombre</label>
		<div class="col-lg-10">
			<input type="text" class="form-control" id="nombre" name="nombre"
				required placeholder="Nombre">
		</div>
	</div>
	<div class="form-group">
		<label for="Product.long_description" class="col-lg-2 control-label">Descripción</label>
		<div class="col-lg-10">
			<textarea class="form-control" rows="5" id="descripcion_corta"
				name="descripcion_corta"
				placeholder="Descripción corta del producto" required></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="Product.sku" class="col-lg-2 control-label">Magento SKU</label>
		<div class="col-lg-10">
			<input type="text" class="form-control" id="magento_sku"
				name="magento_sku" placeholder="SKU" required>
		</div>
	</div>

	<div class="form-group">
		<label for="Product.sku" class="col-lg-2 control-label">Precio</label>
		<div class="col-lg-10">
			<input type="number" class="form-control" id="precio " name="precio"
				placeholder="0.00" required step="any">
		</div>
	</div>



	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-success">Agregar</button>
		</div>
	</div>
</form>


