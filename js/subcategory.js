$(document).ready(function() {
	$.ajax({
		url : 'subcategory/get_list',
		type : 'GET',
		dataType : 'html',
		beforeSend: function() {
			 //$.blockUI({ message: '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">Obteniendo datos...</div></div>' });
			/*$('#ajax_response').block({ 
                message: '<h3>Obteniendo categorias</h3>', 
                css: { border: '3px solid #a00' } 
            }); */
			
			/*
			$('#ajax_response').block({ css: { 
	            border: 'none', 
	            padding: '0px', 
	            backgroundColor: '#000', 
	            '-webkit-border-radius': '10px', 
	            '-moz-border-radius': '10px', 
	            opacity: .5, 
	            color: '#fff'	            
	        },
	        message: '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">Obteniendo datos...</div></div>'}); */
		},
		success : function(response) {
			$('#ajax_response').empty().append(response);
			$('#subcategorias').DataTable();
		},
		error : function(xhr, status) {
			alert('No se pudo comunicar con la base de datos Magento');
		},
		complete : function(xhr, status) {
			//$.unblockUI();
		}
	});
});