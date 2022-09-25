<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CRUD</title>
</head>
<body>

	<?php 
	require_once "conexion.php";
	$sql="SELECT * from credencial";
	$resultado=mysqli_query($con,$sql);
	 ?>
	 <a href="Agregar.php">Guardar Credencial</a><hr>
	<table>
		<thead>
			<tr>
				<th>USUARIO</th>
				<th>PASSWORD</th>
				<th>PRIMER NOMBRE</th>
				<th>SEGUNDO NOMBRE</th>
				<th>PRIMER APELLIDO</th>
				<th>SEGUNDO APELLIDO</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			<?php
			 while ($filas=mysqli_fetch_assoc($resultado)) {

			 echo '
			<tr>
				<td>'.$filas['usuario'].'</td>
				<td>'.$filas['password'].'</td>
				<td>'.$filas['primnom'].'</td>
				<td>'.$filas['segnom'].'</td>
				<td>'.$filas['primapel'].'</td>
				<td>'.$filas['segapel'].'
				';
				echo '
				</td>
				<td>
					<a href="Editar.php?Usuario='.$filas['usuario'].'" title="EDITAR">Editar</a>
					<a href="Eliminar.php?Usuario='.$filas['usuario'].'" title="ELIMINAR"
					onclick="return confirm(\'Desea Eliminar El Registro '.$filas['usuario'].'?\')" >Eliminar</a>
				</td>
			</tr>
			';
			}
			 ?>
		</tbody>
	</table>
</body>
</html>