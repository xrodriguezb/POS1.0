<div class="modal fade" tabindex="-1" role="dialog"
	id="edit_discount_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Modificar Descuento</h4>
			</div>
			<div class="modal-body">



				<form class="form-inline" role="form" id="Product_EditDiscount">
					<div class="form-group">
						<label for="discount_percent">Porcentaje</label> <input type="number"
							class="form-control" id="discount_percent"
							name="discount_percent">
					</div>
					<div class="form-group">
						<label for="discount_name">Nombre</label> <input type="text"
							class="form-control" id="discount_name" name="discount_name">
					</div>
					<div class="form-group">
						<label for="discount_active">Activo</label>
						<select class="form-control" id="discount_active" name="discount_active">
							<option value="Si">Si</option>
							<option value="No">No</option>
						</select>
					</div>



					<div style="display: none">
						<input type="number" class="form-control" id="discount_id"
							name="discount_id" required>
					</div>

				</form>








			</div>
			<div class="modal-footer" id="discount_modal_footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"
					id="close_discount_modal">Cerrar</button>
				<button type="button" class="btn btn-info"
					onclick="save_discount();">Guardar cambios</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->