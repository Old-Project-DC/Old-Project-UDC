<?php 

	session_start();


	require_once "Config/Config.php";
	require_once "Core/Routes.php";
	require_once "Config/ConexionBD.php";
	require_once "Controlador/Controlador_Producto.php";
	require_once "Controlador/Controlador_Muestra.php";
	require_once "Controlador/Controlador_Lote.php";
	require_once "Controlador/Controlador_Login.php";
	require_once "Controlador/Controlador_Jefe.php";
	require_once "Controlador/Controlador_Ensayo.php";
	require_once "Controlador/Controlador_Director.php";
	require_once "Controlador/Controlador_Certificado.php";






	if (!isset($_SESSION['user']) && isset($_GET['c'])) {
		$auxi = strcmp($_GET['c'],'login');	

		if ($auxi==0) {
			$controlador = cargarControlador($_GET['c']);

			if (isset($_GET['a'])) {
				cargarAccion($controlador,$_GET['a']);

			}else{
				cargarAccion($controlador, ACCION_PRINCIPAL);
				
			}
		}else{

			$controlador = cargarControlador('login');
			$auxi=ACCION_PRINCIPAL;
			$controlador->$auxi();
			
		}		
	}elseif (!isset($_SESSION['user'])) {

		$controlador = cargarControlador('login');
		$auxi=ACCION_PRINCIPAL;
		$controlador->$auxi();

	}elseif (isset($_SESSION['user']) && isset($_GET['c'])) {
		$auxi = strcmp($_GET['c'],'login');
		
		if ($auxi==0) {
			
			if (isset($_GET['a'])) {

				$controlador = cargarControlador($_GET['c']);
				$auxi2 = strcmp($_GET['a'],'salir');
				
				
				if ($auxi2==0) {
					cargarAccion($controlador,$_GET['a']);
					
				}else{
					$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
					$auxi=ACCION_PRINCIPAL;
					$controlador->$auxi();
					
				}
			}else{
				
				$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
				$auxi=ACCION_PRINCIPAL;
				$controlador->$auxi();

			}
		}else{

			$controlador = cargarControlador($_GET['c']);
			if (isset($_GET['a'])) {
				cargarAccion($controlador, $_GET['a']);
			}else{
				
			$auxi=ACCION_PRINCIPAL;
			$controlador->$auxi();
			
			}
		}

	}elseif (isset($_SESSION['user'])) {

		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$auxi=ACCION_PRINCIPAL;
		$controlador->$auxi();
		
		
	}



/*
		if (isset($_GET['c'])) {
			
			$controlador = cargarControlador($_GET['c']);

			echo "<---- index primer if--->";
			if (isset($_GET['a'])) {
			
			cargarAccion($controlador, $_GET['a']);

			echo "<---- index segundo if--->";
			}else{

				cargarAccion($controlador, ACCION_PRINCIPAL);
				echo "<---- index primer else--->";
			}
			
			}else {
				$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);

				$auxi=ACCION_PRINCIPAL;
				$controlador->$auxi();
				echo "<---- index segundo else--->";
			}
*/

 ?>
