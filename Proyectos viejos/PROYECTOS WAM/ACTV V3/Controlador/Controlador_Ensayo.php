<?php 
	
	/**
	 * 
	 */
	class Controlador_Ensayo{

		public function __construct(){
			require_once "ModeloDAO/EnsayoDAO.php";
			require_once "Modelo/Ensayo.php";
		}
		
			public function index(){
				$user = $_SESSION['user'];
				$estado = isset($_GET['e']) ? $_GET['e'] : 2;
				$dao = new EnsayoDAO();

				$auxi["ensayo"] = $dao->listar($estado);


				require_once "Vista/views/Ensayo/Listar.php";
			}

			public function modalGuardar(){

				$dao = new EnsayoDAO();
				$ensayo = new Ensayo();

				$tipo_Ensayo = addslashes($_POST['tipo_Ensayo']);
				$medidas = addslashes($_POST['medidas']);
				$id_Muestra = addslashes($_POST['id_Muestra']);				

				$ensayo->setTipo_ensayo($tipo_Ensayo);
				$ensayo->setMedidas($medidas);
				$ensayo->setId_muestra_fk($id_Muestra);

				

				if ($dao->agregar($ensayo)) {
					echo 1;
				}else{
					echo 2;
				}

			}
			public function modalEditar(){
				$dao = new EnsayoDAO();
				$id= $_POST['id'];
				$auxi= $dao->listar_by_id($id);
	
				echo json_encode($auxi);
			}			

			public function Modificar(){

				$dao = new EnsayoDAO();
				$ensayo = new Ensayo();

				if (isset($_POST['n'])) {
					$id= addslashes($_POST['id']);
					$n= addslashes($_POST['n']);

					if ($dao->editarEstado($id, $n)) {
						echo 1;
					}else{
						echo 2;
					}
				}else{
					$id = addslashes($_POST['id']);
					$tipo_ensayo = addslashes($_POST['tipo_ensayo']);
					$medidas = addslashes($_POST['medidas']);
					$id_muestra = addslashes($_POST['id_muestra']);

					$ensayo->setId_ensayo($id);
					$ensayo->setTipo_ensayo($tipo_ensayo);
					$ensayo->setMedidas($medidas);
					$ensayo->setId_muestra_fk($id_muestra);

					
					if ($dao->editar($ensayo, $id)) {
						echo 1;
					}else{
						echo 2;
					}
				}
			}
			public function delete(){
				$dao = new EnsayoDAO();

				$id = $_POST['id'];

				if ($dao->eliminar($id)) {
					echo 1;
				}else{
					echo 2;
				}
			}		
		}

 ?>