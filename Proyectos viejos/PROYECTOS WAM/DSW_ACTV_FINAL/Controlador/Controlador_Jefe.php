<?php 
	
	/**
	 * 
	 */
	class Controlador_Jefe{

		public function __construct(){
			require_once "ModeloDAO/JefeDAO.php";
			require_once "Modelo/Jefe.php";
		}
		
			public function index(){
				$user = $_SESSION['user'];
				$dao = new JefeDAO();
				$auxi["jefe_lab"] = $dao->listar();

				require_once $this->direccion()."Jefe/Listar.php";
				print_r($this->direccion()."Jefe/Listar.php");

			}

			public function vistaAddJefe(){

				require_once $this->direccion()."Jefe/Agregar.php";
				print_r($this->direccion()."Jefe/Agregar.php");
			}

			public function guardar(){

				$dao = new JefeDAO();
				$jefe = new Jefe();

				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['nombre_Usuario']);
				$contraseña = password_hash(addslashes($_POST['contraseña']),PASSWORD_DEFAULT);
				$tipo_Laboratorio = addslashes($_POST['tipo_Laboratorio']);
				$actual= addslashes($_POST['actual']);

				$jefe->setNom_empleado($nombre);
				$jefe->setUsuario($nombre_Usuario);
				$jefe->setContrasena($contraseña);
				$jefe->setTipo_lab($tipo_Laboratorio);
				$jefe->setActual($actual);

				$dao->agregar($jefe);

				$this->vistaAddJefe();

			}
			public function vistaEditar(){

				$dao = new JefeDAO();
				$id= $_GET['id'];
				$auxi["Jefe"]= $dao->listar_by_id($id);
				require_once $this->direccion()."Jefe/Editar.php";
				print_r($this->direccion()."Jefe/Editar.php");
			}

			public function modificar(){

				$dao = new JefeDAO();
				$jefe = new Jefe();

				$id= addslashes($_POST['id']);
				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['nombre_Usuario']);
				$tipo_Laboratorio = addslashes($_POST['tipo_Laboratorio']);
				$actual= addslashes($_POST['actual']);

				$jefe->setNom_empleado($nombre);
				$jefe->setUsuario($nombre_Usuario);
				$jefe->setTipo_lab($tipo_Laboratorio);
				$jefe->setActual($actual);

				$dao->editar($jefe, $id);

				$this->index();
			}
			public function delete(){

				$dao = new JefeDAO();

				$id1= $_POST['id1'];
				$id2= $_POST['id2'];
				$id3= $_POST['id3'];

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