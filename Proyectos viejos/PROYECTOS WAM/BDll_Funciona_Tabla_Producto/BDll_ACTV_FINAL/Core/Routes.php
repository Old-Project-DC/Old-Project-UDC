<?php 
	function cargarControlador($controlador){

		$nombreClassControlador = "Controlador_".ucwords($controlador);
		$archivoControlador ='Controlador/'.$nombreClassControlador.'.php';


		if (!is_file($archivoControlador)) {
			
			$archivoControlador = 'Controlador/'.CONTROLADOR_PRINCIPAL.'.php';
		}else{
			require_once $archivoControlador;
			$control = new $nombreClassControlador();
			return $control;
		}
	}

	function cargarAccion($controller, $accion){


		if (isset($_GET['a']) && method_exists($controller, $accion)) {

			$controller->$accion();
		}else{
			$acci=ACCION_PRINCIPAL;
			$controller->$acci();
		}
	}



 ?>