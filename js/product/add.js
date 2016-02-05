$(document).ready(function() {
	ajax_url=site_base_url+'product/create_new_product';
	$("#Producto").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url : ajax_url,
			type : 'POST',
			dataType : 'json',
			data : $(this).serialize(),
			beforeSend : function() {
				
				$("form#Producto").block({ 
	                message: 'Agregando producto...', 
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
				alert('No se pudo agregar el producto al inventario local');
			}
		});
		
	});
});