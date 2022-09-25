<!DOCTYPE>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="Bootstrap 4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Plugins/Sweet alert 2/sweetalert2.min.css">
        <title>.:PRODUCTOS:.</title>

    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">LABS-DJM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php" tabindex="-1" aria-disabled="true">Productos<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?c=lote" tabindex="-1" aria-disabled="true">Lotes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?c=muestra" tabindex="-1" aria-disabled="true">Muestras</a>
                        </li>
                        <?php if ($_SESSION['rol']=='ADMIN' or $_SESSION['rol']=='JEFE') {?>
                        <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded=" false">
                           Ensayos
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="index.php?c=ensayo&e=1">Aceptados</a>
                           <a class="dropdown-item" href="index.php?c=ensayo&e=2">Pendientes</a>
                           <a class="dropdown-item" href="index.php?c=ensayo&e=0">Rechazados</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">LABS-DJM</a>
                         </div>
                       </li>
                   <?php  }elseif ($_SESSION['rol']=='DIRECTOR') {?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?c=ensayo" tabindex="-1" aria-disabled="true">Ensayos<span class="sr-only">(current)</span></a>
                        </li>
                        <?php  }?> 
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?c=certificado" tabindex="-1" aria-disabled="true">Certificados</a>
                        </li>
                        <?php if ($_SESSION['rol']=='ADMIN') {
                         ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?c=jefe" tabindex="-1" aria-disabled="true">Jefes Lab</a>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?c=director" tabindex="-1" aria-disabled="true">Directores Lab</a>
                        </li>
                        <?php  }?> 
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
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
                    </form>
                </div>
            </nav>
            <a class="btn btn btn-outline-secondary" href="#" data-toggle="modal" data-target="#modalProductoAdd">Agregar Producto</a><br><br>
            <div class="table-responsive">
                <table class="table table-striped" id="tablaProducto">
                    <thead>
                        <tr>
                            <th>Id Producto</th>
                            <th>Nombre Producto</th>
                            <th>Tipo Producto</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($auxi["producto"] as $dato) {
                            echo '
                  <tr>
                
                        <td> ' . $dato['id_producto'] . ' </td>
                        <td> ' . $dato['nom_producto'] . '  </td>
                        <td> ' . $dato['tipo_producto'] . ' </td>
                        <td>
                            <a class="btn btn-outline-secondary" href="#" data-toggle="modal" data-target="#modalProductoEdit" onclick="listarById(' . $dato['id_producto'] . ');" title="EDITAR">Editar</a>
                            <a class="btn btn-outline-danger" href="#" title="ELIMINAR" onclick="alertaEliminar(' . $dato['id_producto'] . ',\'Producto\',\'' . $dato['nom_producto'] . '\',\'Lotes\')" >Eliminar</a>
                            
                        </td>
                
                    </tr>
                    ';
                        }
                        if (empty($auxi["producto"])) {
                            ?>

                        <div class="alert alert-info text-center" role="alert">
                            <strong>Info: </strong> No hay productos registrados!
                        </div>
                    <?php }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include_once "modalProductoAdd.html"; ?>
        <?php include_once "modalProductoEdit.html"; ?>

        <script type="text/javascript" src="js/jquery/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="Bootstrap 4/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/popper/popper.min.js"></script>
        <script type="text/javascript" src="Plugins/Sweet alert 2/sweetalert2.all.min.js" ></script>
        <script type="text/javascript" src="js/Eliminar.js"></script>
        <script type="text/javascript" src="Vista/Producto/Producto.js"></script>
    </body>
</html>