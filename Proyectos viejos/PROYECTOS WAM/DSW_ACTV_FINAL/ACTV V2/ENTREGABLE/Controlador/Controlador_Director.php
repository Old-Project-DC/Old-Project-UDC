<?php 
	
	/**
	 * 
	 */
	class Controlador_Director{

		public function __construct(){
			require_once "ModeloDAO/DirectorDAO.php";
			require_once "Modelo/Director.php";
		}
		
			public function index(){
				$user = $_SESSION['user'];
				$dao = new DirectorDAO();
				$auxi["director"] = $dao->listar();
				$auxi["jefe_lab"] = $dao->listar();
				if ($_SESSION['rol'] == "ADMIN" or $_SESSION['rol'] == "DIRECTOR") {
				require_once "Vista/Director/Listar.php";
				}else{
					header('Location: index.php');
				}


			}
			public function modalGuardar(){

				$dao = new DirectorDAO();
				$director = new Director();

				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['usuario']);
				$contraseña = password_hash(addslashes($_POST['contraseña']),PASSWORD_DEFAULT);
				$actual = addslashes($_POST['actual']);
				$firma = addslashes($_POST['firma']);

				$director->setNom_empleado($nombre);
				$director->setUsuario($nombre_Usuario);
				$director->setContrasena($contraseña);
				$director->setActual($actual);
				$director->setFirma_director($firma);


				if ($dao->agregar($director)) {
					echo 1;
				}else{
					echo 2;
				}

			}
			public function modalEditar(){

				$dao = new DirectorDAO();
				$id= $_POST['id'];
				$auxi= $dao->listar_by_id($id);
				echo json_encode($auxi);
			}

			public function modificar(){

				$dao = new DirectorDAO();
				$director = new Director();

				$id= addslashes($_POST['id']);
				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['usuario']);
				$actual = addslashes($_POST['actual']);
				$firma = addslashes($_POST['firma']);


				$director->setNom_empleado($nombre);
				$director->setUsuario($nombre_Usuario);
				$director->setActual($actual);
				$director->setFirma_director($firma);

				if ($dao->editar($director, $id)) {
					echo 1;
				}else{
					echo 2;
				}
			}
			public function delete(){

				$dao = new DirectorDAO();

				$id1= $_POST['id1'];
				$id2= $_POST['id2'];
				$id2= $_POST['id3'];

				if ($dao->eliminar($id1, $id2, $id3)) {
					echo 1;
				}else{
					echo 2;
				}
			}
		}

 ?>