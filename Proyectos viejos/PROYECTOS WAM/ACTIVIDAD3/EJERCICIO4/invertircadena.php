<?php 
session_start();
$cadena=$_POST['texto'];

$cadenaInvertida=strrev($cadena);


$_SESSION['cadenaInvertida']=$cadenaInvertida;
header('location: index.php');
 ?>