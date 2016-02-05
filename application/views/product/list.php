<?php
/*
 * echo '<pre>';
 * print_r($product_list);
 * echo '</pre>';
 */
?>
<table id="productos">
	<thead>
		<tr>
			<th>Magento SKU</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Descripci&oacute;n</th>
			<th>Activo</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
	<?php

if (count($product_list) > 0 && is_array($product_list)) :
    foreach ($product_list as $product) :
        ?>
<tr>
			<td><?=$product->magento_sku ?></td>
			<td><?=$product->nombre ?></td>
			<td>$<?=$product->precio ?>  MXP</td>
			<td><?=$product->descripcion_corta ?></td>
			<td><div style="text-align:center"><?=$product->activo ?></div></td>
			<td><a href="<?=base_url().'product/edit/'.$product->id?>"
				title="Editar producto"><span
					class="glyphicon glyphicon-edit"></span></a></td>
		</tr>
	<?php endforeach; endif;?>
	</tbody>
</table>