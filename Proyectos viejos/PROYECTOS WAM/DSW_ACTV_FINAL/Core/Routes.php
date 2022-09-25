<?php 
	function cargarControlador($controlador){

		$nombreClassControlador = "Controlador_".ucwords($controlador);
		$archivoControlador ='Controlador/'.$nombreClassControlador.'.php';


		if (!class_exists($nombreClassControlador)) {
			echo "No existe la clase";
			$nombreClassControlador="Controlador_".CONTROLADOR_PRINCIPAL;
			if (!is_file($archivoControlador)) {
				echo "No existe el archivo";
				$archivoControlador = 'Controlador/'.$nombreClassControlador.'.php';
				echo "<--".$archivoControlador."--->";
			}

		}
				require_once $archivoControlador;
				$control = new $nombreClassControlador();
				return $control;

	
	}

	function cargarAccion($controller, $accion){

		if (isset($_GET['a']) && method_exists($controller, $accion)) {

			$controller->$accion();

		}else{
			$acci= ACCION_PRINCIPAL;
			$controller->$acci();
		}
	}



 ?>