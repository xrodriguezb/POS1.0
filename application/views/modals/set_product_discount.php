<div class="modal fade" tabindex="-1" role="dialog"
	id="modal_set_item_discount">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Agregar descuento</h4>
			</div>
			<div class="modal-body">

				<form class="form-inline" id="ShoppingCart_ItemDiscount">
					<div class="form-group">
						<label for="product_item_quantity">Descuento</label>
						<div class="col-lg-10">
						<select class="form-control" id="item_discount_id" name="item_discount_id">
							
						</select>
						<input type="hidden" id="discount_item_id" name="discount_item_id">
					</div>

					</div>

				</form>


			</div>
			<div class="modal-footer" id="buttons_footer_discount">
				<button type="button" class="btn btn-default" data-dismiss="modal"
					id="close_discount_item_modal">Cerrar</button>
				<button type="button" class="btn btn-info"
					onclick="update_item_discount();">Aplicar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->