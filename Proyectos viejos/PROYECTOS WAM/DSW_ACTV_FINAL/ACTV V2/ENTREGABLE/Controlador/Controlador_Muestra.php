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

				require_once "Vista/Muestra/Listar.php";
			}

			public function modalGuardar(){

				$dao = new MuestraDAO();
				$muestra = new Muestra();

				$codigo_Muestra = addslashes($_POST['codigo']);
				$id_Lote = addslashes($_POST['id_Lote']);
				$id_Jefe_Lab = addslashes($_POST['id_Jefe']);

				$muestra->setCodigo_Muestra($codigo_Muestra);
				$muestra->setId_Lote($id_Lote);
				$muestra->setId_Jefe_Lab($id_Jefe_Lab);

				if ($dao->agregar($muestra)) {
					echo 1;
				}else{
					echo 2;
				}

			}
			public function modalEditar(){

				$dao = new MuestraDAO();
				$id= $_POST['id'];
				$auxi= $dao->listar_by_id($id);

				echo json_encode($auxi);
			}

			public function modificar(){

				$dao = new MuestraDAO();
				$muestra = new Muestra();
				$id= addslashes($_POST['id']);
				$codigo_Muestra = addslashes($_POST['codigo']);
				$id_Lote = addslashes($_POST['id_Lote']);
				$id_Jefe_Lab = addslashes($_POST['id_Jefe']);

				$muestra->setCodigo_Muestra($codigo_Muestra);
				$muestra->setId_Lote($id_Lote);
				$muestra->setId_Jefe_Lab($id_Jefe_Lab);

				if ($dao->editar($muestra, $id)) {
					echo 1;
				}else{

					echo 2;
				}
			}


			public function delete(){

				$dao = new MuestraDAO();

				$id= $_POST['id'];

				if ($dao->eliminar($id)) {
					echo 1;
				}else{
					echo 2;
				}
			}
		

		}

 ?>