<?php
include 'conexion.php';
	$usuario=$_POST['usuario'];
	$pass=$_POST['password'];
	$primnom=$_POST['primnom'];
	$segnom=$_POST['segnom'];
	$primapel=$_POST['primapel'];
	$segapel=$_POST['segapel'];
	if ($usuario !=null and $pass != null and $primnom != null and $segnom != null and $primapel != null and $segapel != null) {
		$sql="update credencial set usuario='".$usuario."',password='".$pass."',primnom='".$primnom."',segnom='".$segnom."',primapel='".$primapel."',segapel='".$segapel."' where usuario='".$usuario."'";
		mysqli_query($con,$sql);
	}
		if ($usuario=1) {
			header("location:index.php");
		}
	 ?>