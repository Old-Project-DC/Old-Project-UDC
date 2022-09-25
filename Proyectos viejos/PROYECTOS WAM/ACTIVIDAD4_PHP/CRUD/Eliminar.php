<?php 
include "conexion.php";

$id=$_GET['Usuario'];
$sql="delete from credencial where usuario='".$id."'";
mysqli_query($con,$sql);
	header('location: index.php');

 ?>




