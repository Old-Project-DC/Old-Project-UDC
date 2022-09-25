<?php 

	/**
	 * Clase con los atributos para conectarse con la BD
	 */
	class Conexion{

		public static function conectar(){


			$conexion = new mysqli("localhost","root","","examenes_clinicos","3308");

			return $conexion;
			
		}

	}


 ?>
