<?php 

	require_once "Config/Config.php";
	require_once "Core/Routes.php";
	require_once "Config/ConexionBD.php";
	require_once "Controlador/Controlador_Producto.php";
	if (isset($_GET['c'])) {
		
		$controlador = cargarControlador($_GET['c']);

		if (isset($_GET['a'])) {
		
		cargarAccion($controlador, $_GET['a']);	
		}else{
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
		
	}else {
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$auxi=ACCION_PRINCIPAL;
		$controlador->$auxi();
	}

 ?>