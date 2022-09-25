<?php 
	
	/**
	 * 
	 */
	class Controlador_Login{

		public function __construct(){
			require_once "ModeloDAO/LoginDAO.php";
		}
		
			public function index(){

				require_once "Vista/views/Login/Login.php";
			}
			public function ingresar(){
				$dao = new LoginDAO();
				$nombre_Usuario = addslashes($_POST['user']);
				$contraseña = addslashes($_POST['pass']);
				$resultado=$dao->verificar($nombre_Usuario,$contraseña);

				if ($resultado) {
					$data = $resultado;
					$_SESSION['user'] = $data['nom_user'];
					$_SESSION['rol'] = $data['rol'];
				}else{
					$data = 0;
				}
				print json_encode($data);


			}


			public function salir(){
				
				$dao = new LoginDAO();
				$dao->cerraSession();

				$this->index();
			}
	}

		

 ?>