<?php
echo heading('Nueva Subcategoría', 3);
?>


<form class="form-horizontal" role="form">
	<div class="form-group">
		<label for="SubSubcategory.name" class="col-lg-2 control-label">Nombre</label>
		<div class="col-lg-10">
			<input type="text" class="form-control" id="SubSubcategory.name" name="Subcategory.name" required
				placeholder="Nombre">
		</div>
	</div>
	<div class="form-group">
		<label for="Subcategory.description" class="col-lg-2 control-label">Descripción</label>
		<div class="col-lg-10">
			<textarea class="form-control" rows="5" id="Subcategory.description" name="Subcategory.description"
				placeholder="Descripción" required></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="Subcategory.active" class="col-lg-2 control-label">Activo</label>
		<div class="col-lg-10">
			<select class="form-control" id="Subcategory.active" name="Subcategory.active">
				<option value="active">Si</option>
				<option value="inactive">No</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="Subcategory.thumbnail" class="col-lg-2 control-label">Miniatura</label>
		<div class="col-lg-10">
			<input type="file" accept="image/*" required name="Subcategory.thumbnail" id="Subcategory.thumbnail">
		</div>
	</div>
	
	<div class="form-group">
		<label for="Subcategory.imagen" class="col-lg-2 control-label">Imagen</label>
		<div class="col-lg-10">
			<input type="file" accept="image/*" required name="Subcategory.imagen" id="Subcategory.imagen">
		</div>
	</div>
	
	


	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-default">Agregar</button>
		</div>
	</div>
</form>


