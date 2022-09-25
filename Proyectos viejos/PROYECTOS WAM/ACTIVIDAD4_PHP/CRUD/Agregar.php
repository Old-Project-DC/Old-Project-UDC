<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Guardar Credencial</title>
  </head>
  <body>


<div>
	<div>
		<header> 
			<h1>Guardar Credenciales</h1>
		</header>
		<a href="index.php">Ver listado de Credenciales</a>
		<div id="alertInfo" class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Info!</strong> Registro Guardado!!
		</div>
		<h2>Credencial de Usuario</h2><hr>
		<form action="guardar.php" method="POST" id="form_guardar">
			<label for="usuario">Usuario:</label>
			<input type="text" name="usuario" id="usuario" required><br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required><br>
			<label for="primnom">Primer Nombre:</label>
			<input type="text" name="primnom" id="primnom" required><br>
			<label for="segnom">Segundo Nombre:</label>
			<input type="text" name="segnom" id="segnom"required><br>
			<label for="primapel">Primer Apellido:</label>
			<input type="text" name="primapel" id="primapel"required><br>
			<label for="segapel">Segundo Apellido:</label>
			<input type="text" name="segapel" id="segapel"required><br>
			<button type="submit">Guardar</button>
			
		</form>
	</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script>
	$(document).ready(function(){
	$("#alertInfo").hide();
	$("#form_guardar").submit(function(e){
		e.preventDefaul();
		usuario=$.trim($("#usuario").val());
		pass=$.trim($("#password").val());
		primnom=$.trim($("#primnom").val());
		segnom=$.trim($("#segnom").val());
		primapel=$.trim($("#primapel").val());
		segapel=$.trim($("#segapel").val());
	if (usuario.length>0 && pass.length>0 && primnom.length>0 && segnom.length>0 && primapel.length>0 && segapel.length>0) {
		$("#alertInfo").fadeTo(2000, 500).slideUp(500, function(){
			$("#alertInfo").slideUp(500);

		});
	}
	});
	});
	</script>
  </body>
</html>





