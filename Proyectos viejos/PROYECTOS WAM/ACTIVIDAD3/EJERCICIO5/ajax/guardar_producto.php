<?php
	if (empty($_POST['nombre'])){
		$errors[] = "Ingresa el nombre del producto.";
	} elseif (!empty($_POST['nombre'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $codigo_Producto = mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
	$nombre_Producto = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$categoria_Producto = mysqli_real_escape_string($con,(strip_tags($_POST["categoria"],ENT_QUOTES)));
	$stock = intval($_POST["stock"]);
	$precio = floatval($_POST["precio"]);
	

	// REGISTER data into database
    $sql = "INSERT INTO producto(id, codigo, nombre, categoria, stock, precio) VALUES (NULL,'$codigo_Producto','$nombre_Producto','$categoria_Producto','$stock','$precio')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>			