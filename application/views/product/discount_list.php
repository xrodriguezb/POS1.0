<?php

?>
<table id="productos_descuentos">
	<thead>
		<tr>
			<th>Nombre descuento/promoción</th>
			<th>Porcentaje de Descuento</th>
			<th>Activo</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
	<?php

if (count($discount_list) > 0 && is_array($discount_list)) :
    foreach ($discount_list as $discount) :
        ?>
<tr>
			<td><?=$discount->nombre_descuento ?></td>
			<td><?=$discount->porcentaje_descuento ?>%</td>
			<td><div style="text-align:center"><?=$discount->activo ?></div></td>
			<td><a href="javascript:edit_discount(<?=$discount->id?>,<?=$discount->porcentaje_descuento ?>,'<?=$discount->nombre_descuento ?>','<?=$discount->activo ?>')"
				title="Editar descuento"><span
					class="glyphicon glyphicon-edit"></span></a></td>
		</tr>
	<?php endforeach; endif;?>
	</tbody>
</table>