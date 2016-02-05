<?php
echo heading('Nueva Categoría', 3);
?>


<form class="form-horizontal" role="form">
	<div class="form-group">
		<label for="Category.name" class="col-lg-2 control-label">Nombre</label>
		<div class="col-lg-10">
			<input type="text" class="form-control" id="Category.name" name="Category.name" required
				placeholder="Nombre">
		</div>
	</div>
	<div class="form-group">
		<label for="Category.description" class="col-lg-2 control-label">Descripción</label>
		<div class="col-lg-10">
			<textarea class="form-control" rows="5" id="Category.description" name="Category.description"
				placeholder="Descripción" required></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="Category.active" class="col-lg-2 control-label">Activo</label>
		<div class="col-lg-10">
			<select class="form-control" id="Category.active" name="Category.active">
				<option value="active">Si</option>
				<option value="inactive">No</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="Category.thumbnail" class="col-lg-2 control-label">Miniatura</label>
		<div class="col-lg-10">
			<input type="file" accept="image/*" required name="Category.thumbnail" id="Category.thumbnail">
		</div>
	</div>
	
	<div class="form-group">
		<label for="Category.imagen" class="col-lg-2 control-label">Imagen</label>
		<div class="col-lg-10">
			<input type="file" accept="image/*" required name="Category.imagen" id="Category.imagen">
		</div>
	</div>
	
	


	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-default">Agregar</button>
		</div>
	</div>
</form>


