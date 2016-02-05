$(document).ready(function() {
	$("#SearchProduct").submit(function(e) {
		e.preventDefault();
		ajax_url=site_base_url+'product/get_product_by_sku';
		$.ajax({
			url : ajax_url,
			type : 'POST',
			dataType : 'json',
			data : {
				barcode : $('#product_code').val()
			},
			beforeSend : function() {
				$('#product_detail_response').block({ 
	                message: 'Buscando producto...', 
	                css: { border: '3px solid #ccc' } 
	            });
				$('#product_quantity').val('');

			},
			success : function(result) {
				$('#product_detail_response').unblock();
				if (result.request_response == "OK") {
					product = result.product;
					$('#product_sku').val(product.magento_sku);
					$('#product_cost').val(product.precio);
					$('#product_stock').val(10000); //default
					$('#product_quantity').val(1); //por default 1
					$('#product_name').val(product.nombre);
					$('#add_item').trigger("click");
					

				}else
					alert("No se encontró el artículo en el inventario");

			},
			error : function(xhr, status) {
				alert('ERROR - No se encontró el artículo en el inventario');
				$('#product_detail_response').unblock();
			}
		});
	});
	
	$("#ShoppingCart").submit(function(e) {
		if($('#product_sku').val()==''){
			alert("No hay un producto válido para agregarse a la compra");
			return false;			
		}
	else if(parseInt($('#product_stock').val())<=0){
			alert("No se encontraron existencias en el inventario");
			return false;
		}
	else if(parseInt($('#product_stock').val())<parseInt($('#product_quantity').val())){
		alert("No existen suficientes productos en el inventario")
		return false;
	}
		
		$.ajax({
			url : site_base_url+'shoppingcart/add_item',
			type : 'POST',
			dataType : 'json',
			data : $(this).serialize(),
			beforeSend : function() {
				$('#ShoppingCart').block({ 
	                message: 'Agregando producto...', 
	                css: { border: '3px solid #ccc' } 
	            });

			},
			success : function(result) {
				$('#ShoppingCart').unblock();
				if(result.server_response=="ok"){
				  $('#product_associate_sale').val(result.generated_ids.reference_id_sale);
				  load_shopping_cart(result.generated_ids.reference_id_sale);
				  $('#product_sku').val('');
				  $('#product_cost').val('');
				  $('#product_stock').val('');
				  $('#product_quantity').val('');
				  $('#product_name').val('');
				  $('#product_code').val('');
				}
			

			},
			error : function(xhr, status) {
				$('#ShoppingCart').unblock();
				alert('No se pudo agregar el producto a la compra en curso');
			}
		});
		e.preventDefault();
	});
	
	$('#edit_item_modal').on('shown.bs.modal', function () {
		 
		})
	
});

function load_shopping_cart(sale_id){
	$.ajax({
		url : site_base_url+'shoppingcart/get_shopping_cart',
		type : 'POST',
		dataType : 'html',
		data: {cart_id : sale_id},
		beforeSend : function() {
			$('#shoping_cart_response').block({ 
                message: 'Actualizando carrito...', 
                css: { border: '3px solid #ccc' } 
            });
		},
		success : function(response) {
			$('#shoping_cart_response').empty().append(response);
			$('#product_items').DataTable({
				"bPaginate" : false,
				"searching" : false
			});
			$('#product_items_complete').DataTable({
				"bPaginate" : false,
				"searching" : false
			});
		},
		error : function(xhr, status) {
			alert('No se pudo desplegar su carrito de compras');
		},
		complete : function(xhr, status) {

		}
	});
}

/*
function edit_item_from_cart(sku,cart_id,qty){
	$('#product_item_sku').val(sku);
	$('#product_associate_cart').val(cart_id);
	$('#product_item_quantity').val(qty);
	$('#product_discount_quantity').val('');
	$('#product_total_quantity').val(qty);
	$('#edit_item_modal').modal();
}

function send_update_item_cart(){
	$.ajax({
		url : 'shoppingcart/update_item_cart',
		type : 'POST',
		dataType : 'json',
		data: $('#ShoppingCart_EditItem').serialize(),
		beforeSend : function() {
			$('#edit_item_modal').block({ 
                message: 'Actualizando carrito...', 
                css: { border: '3px solid #ccc' } 
            });
		},
		success : function(response) {
			$('#edit_item_modal').unblock();
			if(response.server_response=="ok"){
				load_shopping_cart($('#product_associate_cart').val());
				$('#close_edit_item_modal').trigger("click");
			}else
				alert('No se actualizó la información');
			
		},
		error : function(xhr, status) {
			$('#edit_item_modal').unblock();
			alert('No se pudo actualizar la información');
		}
	});
}*/

function delete_item_from_cart(item_id){
	if(confirm("Se va a eliminar este producto de la venta en curso.¿Continuar?")){
		$.ajax({
			url : site_base_url+'shoppingcart/delete_item_cart',
			type : 'POST',
			dataType : 'json',
			data: { item_id : item_id},
			beforeSend : function() {
				
			},
			success : function(response) {
				if(response.server_response=="ok"){
					load_shopping_cart($('#product_associate_sale').val());
				}else
					alert('No se actualizó la información');
				
			},
			error : function(xhr, status) {
				alert('No se pudo actualizar la información');
			}
		});
		
	}
	
}

function set_product_discount(product_id,item_id){
	$.ajax({
		url : site_base_url+'product/get_discounts/0',
		type : 'POST',
		dataType : 'json',
		data: { producto_id : product_id},
		beforeSend : function() {
			$('#shoping_cart_response').block({ 
		        message: 'Verificando descuentos disponibles...', 
		        css: { border: '3px solid #ccc' } 
		    });
			
		},
		success : function(response) {
			$('#shoping_cart_response').unblock();
			$('#modal_set_item_discount').modal();
			$('#item_discount_id').empty().append(response.html);
			$('#discount_item_id').val(item_id);
			
		},
		error : function(xhr, status) {
			$('#shoping_cart_response').unblock();
			alert('No se pudo obtener la información');
		}
	});
}

function update_item_discount(){
	$.ajax({
		url : site_base_url+'shoppingcart/add_discount_to_item_in_cart',
		type : 'POST',
		dataType : 'json',
		data: { item_discount_id : $('#item_discount_id').val() , item_id : $('#discount_item_id').val() },
		beforeSend : function() {
			$('#buttons_footer_discount').block({ 
		        message: 'Aplicando descuento...', 
		        css: { border: '3px solid #ccc' } 
		    });
			
		},
		success : function(response) {
			$('#buttons_footer_discount').unblock();
			if(response.server_response=="ok"){
				load_shopping_cart($('#product_associate_sale').val());
				$('#close_discount_item_modal').trigger('click');
			}
			else
				alert('No se pudo actualizar la información');
			
		},
		error : function(xhr, status) {
			$('#buttons_footer_discount').unblock();
			alert('No se pudo actualizar la información');
		}
	});
	
}

function finish(){
	if(confirm('Finalizar Venta.¿Continuar?')){
		
	}
}


function cancel(){
if(confirm('Se va a cancelar esta venta.¿Continuar?')){
		
	}
}