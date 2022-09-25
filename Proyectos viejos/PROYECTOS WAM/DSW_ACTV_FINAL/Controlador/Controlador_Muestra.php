<?php 
	
	/**
	 * 
	 */
	class Controlador_Muestra{

		public function __construct(){
			require_once "ModeloDAO/MuestraDAO.php";
			require_once "Modelo/Muestra.php";
		}
		
			public function index(){
				$user = $_SESSION['user'];
				$dao = new MuestraDAO();
				$auxi["muestra"] = $dao->listar();

				require_once $this->direccion()."Muestra/Listar.php";
				print_r($this->direccion()."Muestra/Listar.php");
			}

			public function vistaAddMuestra(){

				require_once $this->direccion()."Muestra/Agregar.php";
				print_r($this->direccion()."Muestra/Agregar.php");
			}

			public function guardar(){

				$dao = new MuestraDAO();
				$muestra = new Muestra();

				$codigo_Muestra = $_POST['codigo_Muestra'];
				$id_Lote = $_POST['id_Lote'];
				$id_Jefe_Lab = $_POST['id_Jefe_Lab'];

				$muestra->setCodigo_Muestra($codigo_Muestra);
				$muestra->setId_Lote($id_Lote);
				$muestra->setId_Jefe_Lab($id_Jefe_Lab);

				$dao->agregar($muestra);

				$this->vistaAddMuestra();

			}
			public function vistaEditar(){

				$dao = new MuestraDAO();
				$id= $_GET['id'];
				$auxi["Muestra"]= $dao->listar_by_id($id);
				require_once $this->direccion()."Muestra/Editar.php";
				print_r($this->direccion()."Muestra/Editar.php");
			}

			public function modificar(){

				$dao = new MuestraDAO();
				$muestra = new Muestra();

				$codigo_Muestra = $_POST['codigo_Muestra'];
				$id_Lote = $_POST['id_Lote'];
				$id_Jefe_Lab = $_POST['id_Jefe_Lab'];

				$muestra->setCodigo_Muestra($codigo_Muestra);
				$muestra->setId_Lote($id_Lote);
				$muestra->setId_Jefe_Lab($id_Jefe_Lab);

				$dao->editar($producto, $id);

				$this->index();
			}


			public function delete(){

				$dao = new MuestraDAO();

				$id= $_POST['id'];

				$dao->eliminar($id);

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