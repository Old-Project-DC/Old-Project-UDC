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
				if ($_SESSION['rol'] == "ADMIN" or $_SESSION['rol'] == "DIRECTOR") {
				require_once "Vista/Jefe/Listar.php";
				}else{
					header('Location: index.php');
				}

			}

			public function modalGuardar(){

				$dao = new JefeDAO();
				$jefe = new Jefe();

				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['usuario']);
				$contraseña = password_hash(addslashes($_POST['contraseña']),PASSWORD_DEFAULT);
				$tipo_Laboratorio = addslashes($_POST['laboratorio']);
				$actual= addslashes($_POST['actual']);

				$jefe->setNom_empleado($nombre);
				$jefe->setUsuario($nombre_Usuario);
				$jefe->setContrasena($contraseña);
				$jefe->setTipo_lab($tipo_Laboratorio);
				$jefe->setActual($actual);

				if ($dao->agregar($jefe)) {
					echo 1;
				}else{
					echo 2;
				}

			}
			public function modalEditar(){

				$dao = new JefeDAO();
				$id= $_POST['id'];
				$auxi= $dao->listar_by_id($id);

				echo json_encode($auxi);
			}

			public function modificar(){

				$dao = new JefeDAO();
				$jefe = new Jefe();

				$id= addslashes($_POST['id']);
				$nombre = addslashes($_POST['nombre']);
				$nombre_Usuario = addslashes($_POST['usuario']);
				$tipo_Laboratorio = addslashes($_POST['laboratorio']);
				$actual= addslashes($_POST['actual']);

				$jefe->setNom_empleado($nombre);
				$jefe->setUsuario($nombre_Usuario);
				$jefe->setTipo_lab($tipo_Laboratorio);
				$jefe->setActual($actual);

				if ($dao->editar($jefe, $id)) {
					echo 1;
				}else{
					echo 2;
				}
			}
			public function delete(){

				$dao = new JefeDAO();

				$id1= $_POST['id1'];
				$id2= $_POST['id2'];
				$id3= $_POST['id3'];

				if ($dao->eliminar($id1, $id2, $id3)) {
					echo 1;
				}else{
					echo 2;
				}
			}
		}

 ?>