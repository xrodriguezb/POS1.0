<div class="modal fade" tabindex="-1" role="dialog" id="edit_item_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Quitar artículos</h4>
			</div>
			<div class="modal-body">

				<form class="form-inline" id="ShoppingCart_EditItem">
					<div class="form-group">
						<label for="product_item_quantity">Cantidad</label> <input
							type="number" class="form-control" id="product_item_quantity"
							required name="product_item_quantity">

						<div class="form-group" style="display: none">
							<input type="number" class="form-control"
								id="product_associate_cart" name="product_associate_cart"
								required> <input type="text" class="form-control"
								id="product_item_sku" name="product_item_sku"><input
								type="number" class="form-control" id="product_total_quantity"
								required name="product_total_quantity">
						</div>
				
				</form>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="close_edit_item_modal">Cerrar</button>
				<button type="button" class="btn btn-info"
					onclick="send_update_item_cart();">Guardar cambios</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->