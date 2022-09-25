<?php
if (!isset($_POST['usuario'])) {
	header('location: index.php');
}
include "conexion.php"; 
$usuario=$_POST['usuario'];
$pass=$_POST['password'];
$primnom=$_POST['primnom'];
$segnom=$_POST['segnom'];
$primapel=$_POST['primapel'];
$segapel=$_POST['segapel'];

if ($usuario !=null and $pass != null and $primnom != null and $segnom != null and $primapel != null and $segapel != null) {
	$sql="insert into credencial(usuario,password,primnom,segnom,primapel,segapel)values('".$usuario."','".$pass."','".$primnom."','".$segnom."','".$primapel."','".$segapel."')";
	mysqli_query($con,$sql);
	header('location: Agregar.php');
}

?>