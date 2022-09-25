<?php 
session_start();
$compra[] = $_POST['numero1'];
$compra[] = $_POST['numero2'];
$compra[] = $_POST['numero3'];
$compra[] = $_POST['numero4'];
$compra[] = $_POST['numero5'];

$totalCompra=array_sum($compra);
$iva=$totalCompra*0.05;
$descuento=0;
$totalPagar=$totalCompra;
if($totalCompra>100000){
	$descuento=$totalCompra*0.1;
	$totalPagar=$totalCompra-$descuento;
}
$compraMax= max($compra);
$_SESSION['totalCompra']=$totalCompra;
$_SESSION['iva']=$iva;
$_SESSION['descuento']=$descuento;
$_SESSION['totalPagar']=$totalPagar;
$_SESSION['compraMax']=$compraMax;

header('location: index2.php');
 ?>