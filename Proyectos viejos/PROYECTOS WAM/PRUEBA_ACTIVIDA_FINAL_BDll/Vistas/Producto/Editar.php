<?php 
    require_once '../../ModeloDAO/ProductoDAO.php';

    if (isset($_GET['id'])) {
    $dato = ProductoDAO::Listar_by_id($_GET['id']);
    }


 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
    		
      <h1 >Editar producto</h1><br>

      <form action="../../Controlador/Controlador.php?accion=editar" method="POST" class="col-6 offset-3 border border-secondary rounded p-3 mb-2 bg-light  text-dark">
        <div class="form-group col-6 offset-3">
          <label for="id">Id Producto</label>
          <input type="hidden" name="id" value="<?= $dato['Id_Producto'] ?>">
          <input type="number" class="form-control" name="id_Producto" placeholder="Ingrese el id del Producto" value="<?= $dato['Id_Producto'] ?>" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="nombre">Nombre Producto</label>
          <input type="text" class="form-control" name="nombre_Producto" placeholder="Ingrese el nombre" value="<?= $dato['nom_Producto'] ?>" required>
        </div>
        <div class="form-group col-6 offset-3">
          <label for="user">Tipo de Producto</label>
            <input type="text" class="form-control" name="tipo_Producto" placeholder="Ingrese el tipo de producto" value="<?= $dato['Tipo_Producto'] ?>" required>
        </div>
        <div class="form-group">
        	<button type="submit" class="btn btn-outline-secondary" >Editar</button>
        </div>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>