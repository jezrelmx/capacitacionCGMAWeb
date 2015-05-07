<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
		  <div class="row">
		  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		  		<h1 class="text-center">Bienvenido</h1>
		  	</div>
		  </div>
		  <div class="row">
		  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-6 col-md-offset-0">
				<form action="" method="POST" role="form">
					<legend>Sistema de envio de mensajes</legend>
					<div class="form-group">
						<label for="">Escriba su mensaje</label>
						<input type="text" class="form-control" id="txtMensaje" placeholder="Escriba aqui">
					</div>
					<button onclick="enviarMensaje()" type="submit" class="btn btn-primary">Submit</button>
				</form>
		  	</div>
		  </div>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script>
			function enviarMensaje() {
				// var mensaje = document.getElementById('txtMensaje').value;
				var mensaje = $('#txtMensaje').val();

				// alert('Soy un alert y el mensaje es ' + mensaje);

				$.ajax({
						url: 'http://192.168.3.110/servidores/index.php/Welcome/procesarMensaje',
						type: 'post',
						data: {miValor: mensaje},
						success: function (data) {
							alert(JSON.stringify(data));
						},
						error: function (data) {
							alert('Te equivocaste mi buen');
						}
					});
			}
		</script>


	</body>
</html>