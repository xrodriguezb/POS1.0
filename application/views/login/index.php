
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">


<title>POS v1.0 - Login</title>

<style>
body {
	min-height: 2000px;
	padding-top: 0px;
}
</style>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<script>
var site_base_url='<?=base_url()?>';
</script>
<script type="text/javascript"
	src="<?php echo base_url();?>js/login/index.js"></script>


<body>

	<div class="container">
		<!--  content  -->

<?php
echo heading('Iniciar sesión', 3);
?>

		<form role="form" id="FormLogin">
			<div class="form-group">
				<label for="usuario">Usuario</label> <input type="text"
					class="form-control" id="usuario" name="usuario"
					placeholder="Nombre de usuario" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label> <input type="password"
					class="form-control" id="password" name="password"
					placeholder="Contraseña" required>
			</div>

			<button type="submit" class="btn btn-success">Entrar</button>
		</form>



	</div>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script
		src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70.0-2014.11.23/jquery.blockUI.js"></script>
	<script
		src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/md5.js"></script>
</body>
</html>