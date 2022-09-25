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
				$dao = new EnsayoDAO();
				$auxi["ensayo"] = $dao->listar();

				require_once $this->direccion()."Ensayo/Listar.php";
				print_r($this->direccion()."Ensayo/Listar.php");
			}

			public function vistaAddEnsayo(){

				require_once $this->direccion()."Ensayo/Agregar.php";
				print_r($this->direccion()."Ensayo/Agregar.php");
			}

			public function guardar(){

				$dao = new EnsayoDAO();
				$ensayo = new Ensayo();

				$tipo_Ensayo = $_POST['tipo_Ensayo'];
				$medidas = $_POST['medidas'];
				$id_Muestra = $_POST['id_Muestra'];				

				$ensayo->setTipo_ensayo($tipo_Ensayo);
				$ensayo->setMedidas($medidas);
				$ensayo->setId_muestra_fk($id_Muestra);

				$dao->agregar($ensayo);

				$this->vistaAddEnsayo();

			}

			public function modificar(){

				$dao = new EnsayoDAO();
				$ensayo = new Ensayo();

				$id= $_GET['id'];
				$n= $_GET['n'];

				echo "id". $id;
				echo "n". $n;
				$dao->editar($id, $n);

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