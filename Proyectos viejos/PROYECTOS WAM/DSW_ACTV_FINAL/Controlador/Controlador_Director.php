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
				require_once $this->direccion()."Director/Listar.php";
				print_r($this->direccion()."Director/Listar.php");

			}

			public function vistaAddDirector(){

				require_once $this->direccion()."Director/Agregar.php";
				print_r($this->direccion()."Director/Agregar.php");
			}

			public function guardar(){

				$dao = new DirectorDAO();
				$director = new Director();

				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['nombre_Usuario']);
				$contraseña = password_hash(addslashes($_POST['contraseña']),PASSWORD_DEFAULT);
				$actual = addslashes($_POST['actual']);
				$firma = addslashes($_POST['firma']);

				$director->setNom_empleado($nombre);
				$director->setUsuario($nombre_Usuario);
				$director->setContrasena($contraseña);
				$director->setActual($actual);
				$director->setFirma_director($firma);


				$dao->agregar($director);

				$this->vistaAddDirector();

			}
			public function vistaEditar(){

				$dao = new DirectorDAO();
				$id= $_GET['id'];
				$auxi["Director"]= $dao->listar_by_id($id);
				require_once $this->direccion()."Director/Editar.php";
				print_r($this->direccion()."Director/Editar.php");
			}

			public function modificar(){

				$dao = new DirectorDAO();
				$director = new Director();

				$id= addslashes($_POST['id']);
				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['nombre_Usuario']);
				$actual = addslashes($_POST['actual']);
				$firma = addslashes($_POST['firma']);


				$director->setNom_empleado($nombre);
				$director->setUsuario($nombre_Usuario);
				$director->setActual($actual);
				$director->setFirma_director($firma);

				$dao->editar($director, $id);

				$this->index();
			}
			public function delete(){

				$dao = new DirectorDAO();

				$id1= $_POST['id1'];
				$id2= $_POST['id2'];
				$id2= $_POST['id3'];

				$dao->eliminar($id1, $id2, $id3);

				$this->index();
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