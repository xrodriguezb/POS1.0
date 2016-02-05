<table id="categorias">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Activa</th>
			<th>Descripci&oacute;n</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
	<?php
if (count($category_list) > 0 && is_array($category_list)) :
    foreach ($category_list as $_category_detail) :
        ?>
<tr>
			<td><?=$_category_detail['id'] ?></td>
			<td><?=$_category_detail['name'] ?></td>
			<td><?=$_category_detail['active'] ?></td>
			<td><?=$_category_detail['description'] ?></td>
			<td><a
				href="javascript:see_category_full_detail(<?=$_category_detail['id'] ?>);"
				title="Ver detalle de la categoria"><span
					class="glyphicon glyphicon-eye-open"></span></a></td>
		</tr>
	<?php endforeach; endif;?>

	</tbody>
</table>