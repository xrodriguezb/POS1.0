$(document).ready(function() {
	get_product_list();
});

function get_product_list(){
	ajax_url=site_base_url+'product/get_list';
	$.ajax({
		url : ajax_url,
		type : 'GET',
		dataType : 'html',
		beforeSend: function() {
			$("#container_product_list").block({ 
                message: 'Generando listado...', 
                css: { border: '3px solid #ccc' } 
            });

		},
		success : function(response) {
			$('#ajax_response').empty().append(response);
			$('#productos').DataTable({
				"aoColumns": [
		                      null,
		                      { "sType": 'string' },
		                      { "sType": 'string' },
		                      { "bSortable": false },
		                      { "sType": 'string' },
		                      { "bSortable": false },
		                    ]
			});
			$("#container_product_list").unblock();
		},
		error : function(xhr, status) {
			$("#container_product_list").unblock();
			alert('No se pudo generar el listado');
		}
	});
}