<?php  



?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Listar Productos</title>
  </head>
  <body>
    <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">LABS-DJM</a>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#">Lotes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Muestras</a>
                    </li>
                   <li class="nav-item">
                      <a class="nav-link" href="#">Ensayos</a>
                    </li>
              </ul>
            </div>
            <form class="form-inline">
              <button class="btn btn btn-outline-secondary" type="submit">Salir</button>
            </form>
      </nav>
      	<a class="btn btn btn-outline-secondary" href="index.php?c=producto&a=vistaAddProducto">Agregar Producto</a><br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Producto</th>
                    <th>Nombre Producto</th>
                    <th>Tipo Producto</th>
                    <th>Acciones</th>
               
                </tr>
            </thead>
            <tbody>
                <?php foreach ($auxi["producto"] as $dato) {
                
                    echo'<tr>
                
                        <td>'.$dato['Id_Producto'].'</td>
                        <td>'.$dato['nom_Producto'].'</td>
                        <td>'.$dato['Tipo_Producto'].'</td>
                        <td>
                            <a class="btn btn-outline-secondary" href="index.php?c=producto&a=vistaEditar&id='.$dato['Id_Producto'].'" title="EDITAR">Editar</a>
                            <a class="btn btn-outline-danger" href="index.php?c=producto&a=delete&id='.$dato['Id_Producto'].'" title="ELIMINAR"
                            onclick="return confirm(\'Desea Eliminar El Registro '.$dato['nom_Producto'].'?\')" >Eliminar</a>
                        </td>
                
                    </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>'

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>