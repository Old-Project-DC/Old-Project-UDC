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

				require_once "Vista/views/Certificado/Listar.php";
			}
		}

 ?>