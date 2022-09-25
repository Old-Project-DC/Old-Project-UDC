<?php 
require_once "conexion.php";
$id=@$_GET['Usuario'];
$sql="select * from credencial where usuario='".$id."'";
$resultado=mysqli_query($con,$sql);
	while ($filas=mysqli_fetch_assoc($resultado)) {

 ?>
 <div>
		<h1>Editar Credenciales</h1>
		<a href="index.php">Ver listado de Credenciales</a>
		<h2>Información Credencial</h2><hr>
		<form action="actualizar.php" method="POST">
			<label for="usuario">Usuario:</label>
			<input type="text" name="usuario" value="<?php echo $filas['usuario']?>"><br>
			<label for="password">Password:</label>
			<input type="password" name="password" value="<?php echo $filas['password'] ?>"><br>
			<label for="primnom">Primer Nombre:</label>
			<input type="text" name="primnom" value="<?php echo $filas['primnom'] ?>"><br>
			<label for="segnom">Segundo Nombre:</label>
			<input type="text" name="segnom" value="<?php echo $filas['segnom'] ?>"><br>
			<label for="primapel">Primer Apellido:</label>
			<input type="text" name="primapel" value="<?php echo $filas['primapel'] ?>"><br>
			<label for="segapel">Segundo Apellido:</label>
			<input type="text" name="segapel" value="<?php echo $filas['segapel'] ?>"><br>
			<input type="submit" value="Guardar">
			
		</form>
	<?php } ?>
	</div>