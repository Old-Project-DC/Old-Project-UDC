<?php 
	require_once 'C:\wamp64\www\ACTIVIDAD_CIPAS_BDll_FINAL_TCC\ModeloDAO\ProductoDAO.php';
	require_once 'C:\wamp64\www\ACTIVIDAD_CIPAS_BDll_FINAL_TCC\Modelo\Producto.php';

	if (isset($_GET['accion'])) {

		$accion= $_GET['accion'];

	switch ($accion) {

		case 'agregar':

		$p = new Producto();
        $id_Producto = $_POST['id_Producto'];
        $nombre= $_POST['nombre_Producto'];
        $tipo = $_POST['tipo_Producto'];
		$p = new Producto();
		$p->setId_Producto($id_Producto);
		$p->setNombre_Producto($nombre);
		$p->setTipo_Producto($tipo);

			ProductoDAO::Agregar($p);
			break;

		case 'editar':

        $id_Producto = $_POST['id_Producto'];
        $nombre= $_POST['nombre_Producto'];
        $tipo = $_POST['tipo_Producto'];
		$p = new Producto();
		$p->setId_Producto($id_Producto);
		$p->setNombre_Producto($nombre);
		$p->setTipo_Producto($tipo);
		$id = $_POST['id'];			


			ProductoDAO::Editar($p,$id);

			break;

		case 'eliminar':
			ProductoDAO::Eliminar($_GET['id']);
			break;		
	}


	header('Location: ../Vistas/Producto/Listar.php');
	}



 ?>