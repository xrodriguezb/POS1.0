<script>
var site_base_url='<?=base_url()?>';
</script>
<script type="text/javascript"
	src="<?php echo base_url();?>js/product/edit.js"></script>
<?php
echo heading('Editar Producto', 3);

if (count($product_detail) > 0) :
    $product = $product_detail[0];
    $selected_activo = ($product->activo == 'Si') ? 'selected' : '';
    $selected_inactivo = ($product->activo == 'No') ? 'selected' : '';
    ?>
<style>
 
    </style>
    <p>
<div class="bs-example">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#sectionA">Información
				General</a></li>
		<li><a data-toggle="tab" href="#sectionB">Descuentos</a></li>
	</ul>
	<div class="tab-content">
		<div id="sectionA" class="tab-pane fade in active">
			<p>
			
			
			<form class="form-horizontal" role="form" id="Producto">
				<div class="form-group">

					<label for="id" class="col-lg-2 control-label">ID</label>
					<div class="col-lg-10">
						<input type="number" class="form-control" id="id" name="id"
							required placeholder="ID" value="<?=$product->id?>" readonly>
					</div>


				</div>
				<div class="form-group">


					<label for="nombre" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre" name="nombre"
							required placeholder="Nombre" value="<?=$product->nombre ?>">
					</div>

				</div>
				<div class="form-group">
					<label for="Product.long_description"
						class="col-lg-2 control-label">Descripción</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="5" id="descripcion_corta"
							name="descripcion_corta"
							placeholder="Descripción corta del producto" required><?=$product->descripcion_corta?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="Product.sku" class="col-lg-2 control-label">Magento SKU</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="magento_sku"
							name="magento_sku" placeholder="SKU" required
							value="<?=$product->magento_sku?>">
					</div>
				</div>

				<div class="form-group">
					<label for="activo" class="col-lg-2 control-label">Precio</label>
					<div class="col-lg-10">
						<input type="number" class="form-control" id="precio "
							name="precio" placeholder="0.00" required step="any"
							value="<?=$product->precio ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="activo" class="col-lg-2 control-label">Activo</label>
					<div class="col-lg-10">
						<select class="form-control" id="activo" name="activo">
							<option value="Si" <?=$selected_activo?>>Si</option>
							<option value="No" <?=$selected_inactivo?>>No</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-success">Actualizar</button>
					</div>
				</div>
			</form>

			<!-- SECCION A -->
		</div>
		<div id="sectionB" class="tab-pane fade">
			<p>
			
			
			<form class="form-horizontal" role="form" id="ProductoDescuento">
				<div class="form-group">

					<label for="id" class="col-lg-2 control-label">Producto ID</label>
					<div class="col-lg-10">
						<input type="number" class="form-control" id="producto_id"
							name="producto_id" required placeholder="ID"
							value="<?=$product->id?>" readonly>
					</div>


				</div>
				<div class="form-group">


					<label for="nombre" class="col-lg-2 control-label">Porcentaje</label>
					<div class="col-lg-10">
						<input type="number" class="form-control"
							id="porcentaje_descuento" name="porcentaje_descuento" required>
					</div>

				</div>

				<div class="form-group">


					<label for="nombre" class="col-lg-2 control-label">Nombre
						descuento/promoción</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre_descuento"
							name="nombre_descuento">
					</div>

				</div>


				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-success">Agregar</button>
					</div>
				</div>
			</form>
			<p>
			
			
			<div id="ajax_discounts_container">
				<div id="ajax_discounts_response"></div>
			</div>


			<!-- SECCION B -->

		</div>

	</div>
</div>































<?php 
endif;
?>

