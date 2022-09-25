<?php 

	/**
	 * 
	 */
	class LoginDAO{

		private $conBD;
		
		public function __construct(){

			$this->conBD = Conexion::conectar();
		}

		public function listar_by_usuer($user){

			$sql = "SELECT * FROM empleados WHERE usuario='".$user."'";
			$resultado = $this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;

			}

		public function verificar($user, $contra){

			$sql="SELECT * FROM USUARIOS WHERE nom_user='".$user."'";
			$resultado=$this->conBD->query($sql);
			$row = $resultado->fetch_assoc();

			if (password_verify($contra, $row['password'])) {
				return $row;
			}else{
				return $row = null;
			}



			/*if ($resultado=$this->conBD->query($sql)) {
				while ($row= $resultado->fetch_assoc()) {

					$usuario['usuario']=$row;	
				} 
				if (!password_verify($contra, $usuario['usuario']['password'])) {
				  	return false;
				}else{
				  	
					return $usuario;
				} 
			}*/
		}
		public function cerraSession(){
			if (isset($_SESSION['user'])) {
				unset ($_SESSION['user']);
				session_destroy();
					
				}
		}


	}

 ?>