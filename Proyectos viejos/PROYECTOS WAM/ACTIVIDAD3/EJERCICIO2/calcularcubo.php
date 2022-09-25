<?php 
session_start();
$numero=$_POST['numero'];
$resultado;

if($numero==""){
	echo'<script type="text/javascript">
    alert("Debe digitar un numero");
    window.location.href="index.php";
    </script>';
}else if($numero<0){
$resultado=$numero*($numero*-1);
}else{
$resultado = $numero **2;
};
if($resultado>100){
	echo'<script type="text/javascript">
    alert("Eres muy afortunado tu resultado es mayor que 100");
    window.location.href="index.php";
    </script>';
};
		
	$_SESSION['resultado']=$resultado;
	header('location: index.php');
?>