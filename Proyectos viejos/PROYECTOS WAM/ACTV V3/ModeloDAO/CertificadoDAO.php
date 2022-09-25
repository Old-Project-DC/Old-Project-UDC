<?php 

	/**
	 * 
	 */
	class CertificadoDAO{

		private $conBD;
		private $certificados;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
			$this->certificados = array();
		}

		public function listar(){

			$sql = "SELECT * FROM constancias_certificado";
			$resultado = $this->conBD->query($sql);

			while ($row = $resultado->fetch_assoc()) {
				
				$this->certificados[] = $row;
			}

			return $this->certificados;
		}

	}

 ?>