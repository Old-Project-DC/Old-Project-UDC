<?php 
	
	/**
	 * 
	 */
	class Controlador_Certificado{

		public function __construct(){
			require_once "ModeloDAO/CertificadoDAO.php";
		}
		
			public function index(){
				$user = $_SESSION['user'];
				$dao = new CertificadoDAO();
				$auxi["certificado"] = $dao->listar();

				require_once $this->direccion()."Certificado/Listar.php";
				print_r($this->direccion()."Certificado/Listar.php");
			}

			public function direccion(){
			$rol = $_SESSION['rol'];
			$dir="";
			if ($rol=="ADMIN") {
				$dir="Vista/";

			}elseif ($rol=="JEFE") {
				$dir="jefe/Vista/";	

			}else{
						
				$dir="director/Vista/";
			}
				return $dir;
			

		}
		

		}

 ?>