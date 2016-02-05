$(document).ready(function() {

	var md5 = function(value) {
		return CryptoJS.MD5(value).toString();
	}

	ajax_url = site_base_url + 'login/check';
	$("#FormLogin").submit(function(e) {
		normal_pwd = $('#password').val();
		md5_pwd = md5(normal_pwd);
		$('#password').val(md5_pwd);
		e.preventDefault();
		$.ajax({
			url : ajax_url,
			type : 'POST',
			dataType : 'json',
			data : $(this).serialize(),
			beforeSend : function() {

				$("form#FormLogin").block({
					message : 'Verificando...',
					css : {
						border : '3px solid #ccc'
					}
				});

			},
			success : function(result) {
				$('#password').val(normal_pwd);
				$("form#FormLogin").unblock();
				if (result.response == "ok") {
					window.location.href = site_base_url + 'dashboard'
				}else
					alert("ACCESO INCORRECTO");
			},
			error : function(xhr, status) {
				$("form#FormLogin").unblock();
				alert('No se pudo procesar su petición.');
				$('#password').val(normal_pwd);
			}
		});

	});
});