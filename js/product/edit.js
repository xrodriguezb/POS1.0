$(document).ready(function() {
	get_product_discounts();
	ajax_url=site_base_url+'product/update';
	$("#Producto").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url : ajax_url,
			type : 'POST',
			dataType : 'json',
			data : $(this).serialize(),
			beforeSend : function() {
				
				$("form#Producto").block({ 
	                message: 'Actualizando producto...', 
	                css: { border: '3px solid #ccc' } 
	            });

			},
			success : function(result) {
				$("form#Producto").unblock();
				if(result.response=="ok"){
				 window.location.href=site_base_url+'product'
				}
			},
			error : function(xhr, status) {
				$("form#Producto").unblock();
				alert('No se pudo actualizar el producto');
			}
		});
		
	});
	
	$("#ProductoDescuento").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url : site_base_url+'product/add_discount',
			type : 'POST',
			dataType : 'json',
			data : $(this).serialize(),
			beforeSend : function() {
				
				$("form#ProductoDescuento").block({ 
	                message: 'Agregando descuento...', 
	                css: { border: '3px solid #ccc' } 
	            });

			},
			success : function(result) {
				$("form#ProductoDescuento").unblock();
				if(result.response=="ok"){
					get_product_discounts();
					$("form#ProductoDescuento").trigger("reset");
				 
				}else
					alert('No se pudo crear el descuento');
			},
			error : function(xhr, status) {
				$("form#ProductoDescuento").unblock();
				alert('No se pudo crear el descuento');
			}
		});
		
	});
});

function get_product_discounts(){
	ajax_url=site_base_url+'product/get_discounts';
	$.ajax({
		url : ajax_url,
		type : 'POST',
		dataType : 'html',
		data : { producto_id : $('#producto_id').val() },
		beforeSend : function() {
			
			$("#ajax_discounts_container").block({ 
                message: 'Listando descuentos...', 
                css: { border: '3px solid #ccc' } 
            });

		},
		success : function(result) {
			$("#ajax_discounts_container").unblock();
			$("#ajax_discounts_response").empty().html(result);
			$('#productos_descuentos').DataTable({
				"aoColumns": [
		                      { "sType": 'string' },
		                      { "sType": 'string' },
		                      { "sType": 'string' },
		                      { "bSortable": false },
		                    ]
			});
			
		},
		error : function(xhr, status) {
			$("#ajax_discounts_container").unblock();
			alert('No se pudo obtener la lista de descuentos');
		}
	});
}

function edit_discount(discount_id,percent,name,active){
 $('#discount_percent').val(percent);
 $('#discount_name').val(name);
 $('#discount_id').val(discount_id);
 $('#discount_active').val(active);
 $('#edit_discount_modal').modal();
}

function save_discount(){
	ajax_url=site_base_url+'product/update_discount';
	$.ajax({
		url : ajax_url,
		type : 'POST',
		dataType : 'json',
		data : $('#Product_EditDiscount').serialize(),
		beforeSend : function() {
			$("#discount_modal_footer").block({ 
                message: 'Actualizando...', 
                css: { border: '3px solid #ccc' } 
            });

		},
		success : function(result) {
			$("#discount_modal_footer").unblock();
			if(result.server_response=="ok"){
				get_product_discounts();
				$('#close_discount_modal').trigger('click');
			}
				
		},
		error : function(xhr, status) {
			$("#discount_modal_footer").unblock();
			alert('No se pudo actualizar la información');
		}
	});
	
}