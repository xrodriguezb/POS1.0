<script>
var site_base_url='<?=base_url()?>';
</script>
<script type="text/javascript"
	src="<?php echo base_url();?>js/shoppingcart/index.js"></script>
<?php
echo heading('Venta', 3);
?>

<form class="form-inline" id="SearchProduct">
	<label for="product_code">Producto</label> <input type="text"
		class="form-control" id="product_code" name="product_code" required>

	<button type="submit" class="btn btn-info" id="search_product">
		<span class="glyphicon glyphicon-search"></span>Buscar
	</button>
</form>


<form class="form-inline" id="ShoppingCart">


	<p>
	
	
	<div id="product_detail_response" style="display: none">

		<fieldset class="scheduler-border">
			<legend class="scheduler-border">Detalle del Producto</legend>
		</fieldset>

		<div class="form-group">
			<label for="product_name">Nombre</label> <input type="text"
				class="form-control" id="product_name" name="product_name" readonly>
		</div>

		<div class="form-group">
			<label for="product_sku">SKU</label> <input type="text"
				class="form-control" id="product_sku" name="product_sku" readonly>
		</div>
		<div class="form-group">
			<label for="product_cost">Costo</label> <input type="number"
				class="form-control" id="product_cost" name="product_cost" readonly
				step="any">
		</div>
		<div class="form-group">
			<label for="product_stock">Disponibles</label> <input type="number"
				class="form-control" id="product_stock" readonly>
		</div>
	</div>
	<p>
	
	
	<p>
	
	
	<div id="controls_sale" style="display:none">

		<div class="form-group">
			<label for="product_sku">No. de Venta</label> <input type="text"
				class="form-control" id="product_associate_sale"
				name="product_associate_sale" readonly>
		</div>

		<div class="form-group">
			<label for="product_quantity">Cantidad</label> <input type="number"
				class="form-control" id="product_quantity" name="product_quantity"
				required>
		</div>

		<button type="submit" class="btn btn-info" id="add_item">
			<span class="glyphicon glyphicon-shopping-cart"></span> Agregar
		</button>
	</div>

</form>
<p>
<fieldset class="scheduler-border">
	<div id="shoping_cart_response"></div>
</fieldset>

