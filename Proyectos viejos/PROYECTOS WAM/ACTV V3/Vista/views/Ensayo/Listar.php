<!DOCTYPE>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <link rel="stylesheet" type="text/css" href="Vista/Bootstrap 4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Vista/Plugins/Sweet alert 2/sweetalert2.min.css">

        <title>.:ENSAYOS:.</title>
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
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?c=muestra" tabindex="-1" aria-disabled="true">Muestras</a>
                        </li>
                        <?php if ($_SESSION['rol']=='ADMIN' or $_SESSION['rol']=='JEFE') {?>
                        <li class="nav-item dropdown active">
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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?c=ensayo" tabindex="-1" aria-disabled="true">Ensayos<span class="sr-only">(current)</span></a>
                        </li>
                        <?php  }?> 
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?c=certificado" tabindex="-1" aria-disabled="true">Certificados</a>
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
            <div class="table-responsive">
            <?php if($estado ==2 && ($_SESSION['rol']=='ADMIN' or $_SESSION['rol']=='JEFE')){
            echo '
            <a class="btn btn btn-outline-secondary" href="#" data-toggle="modal" data-target="#modalEnsayoAdd">Agregar Ensayo</a><br><br>
                <h3>Listado de pendientes</h3>
            ';
            }elseif ($estado ==1 && ($_SESSION['rol']=='ADMIN' or $_SESSION['rol']=='JEFE')) {
               echo "<h3>Listado de aprobados</h3>";
            }elseif($_SESSION['rol']=='ADMIN' or $_SESSION['rol']=='JEFE'){
                echo "<h3>Listado de rechazados</h3>";
            }else{ 
                echo "<h3>Listado de pendientes</h3>";
             } ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id Ensayo</th>
                            <th>Id Muestra</th>
                            <th>Medidas</th>
                            <th>Tipo Ensayo</th>
                            <th>Nombre Producto</th>
                            <th>Id Lote</th>
                            <th>Cantidad Producto</th>
                          <?php if ($estado ==2 ) {
                            ?>
                            <th>Acciones</th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($auxi["ensayo"] as $dato) {

                            echo'<tr>
                
                        <td>' . $dato['id_ensayo'] . '</td>
                        <td>' . $dato['id_muestra_fk'] . '</td>
                        <td>' . $dato['medidas'] . '</td>
                        <td>' . $dato['tipo_ensayo'] . '</td>
                        <td>' . $dato['nom_producto'] . '</td>
                        <td>' . $dato['id_lote'] . '</td>
                        <td>' . $dato['cantidad_producto'] . '</td>
                        <td>
                        ';
                            
                        if ($estado == 2 && $_SESSION['rol']=='JEFE') {
                            
                        echo '
                            
                            <a class="btn btn-outline-secondary" href="#" data-toggle="modal" data-target="#modalEnsayoEdit" onclick="listarById('.$dato['id_ensayo'].');" title="EDITAR">Editar</a>
                            <a class="btn btn-outline-danger" href="#"  onclick="alertaEliminar('.$dato['id_ensayo'].',\'ensayo\',\''.$dato['id_ensayo'].'\');" title="ELIMINAR" >Eliminar</a>
                        </div>
                        ';
                        }if ($_SESSION['rol']=='DIRECTOR') {
                            echo '  

                             <a class="btn btn-outline-secondary" href="#" onclick="alertaAprobarEnsayo('. $dato['id_ensayo'] .')">Aprobar</a>
                            <a class="btn btn-outline-danger" href="#" onclick="alertaRechazarEnsayo('. $dato['id_ensayo'] .')" >Rechazar</a>
                            ';
                        }if ($estado == 2 && $_SESSION['rol']=='ADMIN') {
                         echo '   
                          <div class="btn-group" role="group">
                            <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Opciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEnsayoEdit" onclick="listarById('.$dato['id_ensayo'].');" title="EDITAR">Editar</a>
                                <a class="dropdown-item" href="#" onclick="alertaEliminar('.$dato['id_ensayo'].',\'ensayo\',\''.$dato['id_ensayo'].'\',\'Certificados o Informes\');" title="ELIMINAR" >Eliminar</a>
                                <div class="dropdown-divider "></div>
                                <a class="dropdown-item" href="#" onclick="alertaAprobarEnsayo('. $dato['id_ensayo'] .')">Aprobar</a>
                                <a class="dropdown-item" href="#" onclick="alertaRechazarEnsayo('. $dato['id_ensayo'] .')" >Rechazar</a>
                            </div>
                          </div>
                        ';
                        }
                            ?>
                    <?php
                        }
                        echo '
                        </td>
                    </tr>
                    ';
                        if (empty($auxi["ensayo"])) {
                            ?>
                        <div class="alert alert-info text-center" role="alert">
                            <strong>Info: </strong> No hay ensayos registrados!
                        </div>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include_once"modalEnsayoAdd.html" ?>
        <?php include_once"modalEnsayoEdit.html" ?>



        <script type="text/javascript" src="Vista/js/jquery/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="Vista/js/popper/popper.min.js"></script>
        <script type="text/javascript" src="Vista/Bootstrap 4/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="Vista/Plugins/Sweet alert 2/sweetalert2.all.min.js" ></script>
        <script type="text/javascript" src="Vista/js/Eliminar.js"></script>
        <script type="text/javascript" src="Vista/js/Ensayo.js"></script>
    </body>
</html>