<?php ?>

<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="Vista/Bootstrap 4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Vista/Plugins/Sweet alert 2/sweetalert2.min.css">

        <title>.:MUESTRAS:.</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="index.php" tabindex="-1" aria-disabled="true">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?c=lote" tabindex="-1" aria-disabled="true">Lotes</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="index.php?c=muestra" tabindex="-1" aria-disabled="true">Muestras<span class="sr-only">(current)</span></a>
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
            <a class="btn btn btn-outline-secondary" href="#" data-toggle="modal" data-target="#modalMuestraAdd" >Agregar Muestra</a><br><br>
            <div class="table-responsive">
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
                        <?php
                        foreach ($auxi["muestra"] as $dato) {

                            echo'<tr>
                
                        <td>' . $dato['id_muestra'] . '</td>
                        <td>' . $dato['cod_muestra'] . '</td>
                        <td>' . $dato['id_jefe_lab_fk'] . '</td>
                        <td>' . $dato['id_lote_fk'] . '</td>
                        <td>
                            <a class="btn btn-outline-secondary" href="#" title="EDITAR" data-toggle="modal" data-target="#modalMuestraEdit" onclick="listarById(' . $dato['id_muestra'] . ');">Editar</a>
                            <a class="btn btn-outline-danger" href="#" title="ELIMINAR" onclick="alertaEliminar(' . $dato['id_muestra'] . ',\'Muestra\',\'' . $dato['id_muestra'] . '\',\'Ensayos\')" >Eliminar</a>
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
        </div>

        <?php require_once "modalMuestraAdd.html"; ?>
        <?php require_once "modalMuestraEdit.html"; ?>

        <script type="text/javascript" src="Vista/js/jquery/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="Vista/js/popper/popper.min.js"></script>
        <script type="text/javascript" src="Vista/Bootstrap 4/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="Vista/Plugins/Sweet alert 2/sweetalert2.all.min.js" ></script>
        <script type="text/javascript" src="Vista/js/Eliminar.js"></script>
        <script type="text/javascript" src="Vista/js/Muestra.js"></script>
    </body>
</html>