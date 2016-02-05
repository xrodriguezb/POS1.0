<?php
?>
<legend class="scheduler-border">Detalle de Venta</legend>
<button type="button" class="btn btn-success" onclick="finish();">
	<span class="glyphicon glyphicon-ok"></span>
	Terminar Venta
</button>

<button type="button" class="btn btn-warning" onclick="cancel();">
	<span class="glyphicon glyphicon-remove"></span>
	Cancelar Venta
</button>
<p>
<p>
<div class="bs-example">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#sectionA">Por Producto</a></li>
		<li><a data-toggle="tab" href="#sectionB">Desglozado</a></li>
	</ul>
	<div class="tab-content">
		<div id="sectionA" class="tab-pane fade in active">

			<table id="product_items">
				<thead>
					<tr>
						<th>Aticulo</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Monto</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="3" style="text-align: right">Descuentos:</th>
						<th>$<span id="general_discount_amount"><?=$total_discount ?></span>
							MXP
						</th>
					</tr>
					<tr>
						<th colspan="3" style="text-align: right">Total:</th>
						<th>$<span id="final_amount"><?=$total_amount?></span> MXP
						</th>
					</tr>
				</tfoot>

				<tbody>
 <?php
if (count($grouped_cart_items) > 0) :
    foreach ($grouped_cart_items as $item) :
        ?>
    <tr>
						<td><?= $item['nombre'] ?></td>
						<td id="quantity_for_item_<?= $item['producto_id'] ?>"><?= $item['cantidad'] ?></td>
						<td>$<?= $item['precio'] ?> MXP</td>
						<td>$<span id="total_amount_for_item_<?= $item['producto'] ?>"><?= $item['monto']?> </span>
							MXP
						</td>
					</tr>
	
	<?php endforeach; endif;?>
	</tbody>
			</table>

			<!-- SECCION A -->
		</div>
		<div id="sectionB" class="tab-pane fade">

			<table id="product_items_complete">
				<thead>
					<tr>
						<th>Aticulo</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Descuento</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="4" style="text-align: right">Descuentos:</th>
						<th>$<span id="general_discount_amount"><?=$total_discount ?></span>
							MXP
						</th>
					</tr>
					<tr>
						<th colspan="4" style="text-align: right">Total:</th>
						<th>$<span id="final_amount"><?=$total_amount?></span> MXP
						</th>
					</tr>
				</tfoot>

				<tbody>
 <?php
if (count($complete_detail) > 0) :
    foreach ($complete_detail as $cd) :
        if ((int) $cd->porcentaje_descuento <= 0)
            $cd->porcentaje_descuento = 0;
        ?>
    <tr>
						<td><?= $cd->articulo ?></td>
						<td>1</td>
						<td>$<?= $cd->precio ?> MXP</td>
						<td><?=$cd->porcentaje_descuento ?>%</td>
						<td><a
							href="javascript:set_product_discount(<?=$cd->producto_id ?>,<?=$cd->item_id ?>);"
							title="Añadir descuento a este articulo"><span
								class="glyphicon glyphicon-edit"></span></a> <a
							href="javascript:delete_item_from_cart(<?=$cd->item_id ?>);"
							title="Quitar producto de la venta actual"><span
								class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
	
	<?php endforeach; endif;?>
	</tbody>
			</table>



			<!-- SECCION B -->

		</div>

	</div>
</div>


