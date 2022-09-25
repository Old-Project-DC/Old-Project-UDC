<?php  



?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>.:Muestras:.</title>
  </head>
  <body>
    <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">LABS-DJM</a>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="index.php" tabindex="-1" aria-disabled="true">Productos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link " href="index.php?c=lote" tabindex="-1" aria-disabled="true">Lotes</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link " href="index.php?c=muestra" tabindex="-1" aria-disabled="true">Muestras</a>
                    </li> 
                   <li class="nav-item">
                      <a class="nav-link" href="index.php?c=ensayo" tabindex="-1" aria-disabled="true">Ensayos sin avalar</a>
                    </li>
                   <li class="nav-item">
                      <a class="nav-link" href="index.php?c=certificado" tabindex="-1" aria-disabled="true">Certificados</a>
                    </li>
              </ul>
            </div>

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>
                    <small>
                     USER: 
                    </small>
                  </span>
                      <?php 
                      echo $user;
                       ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="index.php?c=login&a=salir">Cerrar Sesión</a>
                      <div class="dropdown-divider "></div>
                      <span class="dropdown-item"><small >Vuelva Pronto!</small></span>
                </div>
            </div>
          </div>    
      </nav>
      	<a class="btn btn btn-outline-secondary" href="index.php?c=muestra&a=vistaAddMuestra">Agregar Muestra</a><br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Muestra</th>
                    <th>Código Muestra</th>
                    <th>Id Jefe Lab</th>
                    <th>Id Lote</th>
                    <th>Acciones</th>
               
                </tr>
            </thead>
            <tbody>
                <?php foreach ($auxi["muestra"] as $dato) {
                
                    echo'<tr>
                
                        <td>'.$dato['id_muestra'].'</td>
                        <td>'.$dato['cod_muestra'].'</td>
                        <td>'.$dato['id_jefe_lab_fk'].'</td>
                        <td>'.$dato['id_lote_fk'].'</td>
                        <td>
                            <a class="btn btn-outline-secondary" href="index.php?c=muestra&a=vistaEditar&id='.$dato['id_muestra'].'" title="EDITAR">Editar</a>
                            <a class="btn btn-outline-danger" href="index.php?c=muestra&a=delete&id='.$dato['id_muestra'].'" title="ELIMINAR"
                            onclick="return confirm(\'Desea Eliminar El Registro '.$dato['id_muestra'].'?\')" >Eliminar</a>
                        </td>
                
                    </tr>';
                    }
                if (empty($auxi["muestra"])) {
                ?>
                <div class="alert alert-info text-center" role="alert">
                  <strong>Info: </strong> No hay muestras registrados!
                </div>
              <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>