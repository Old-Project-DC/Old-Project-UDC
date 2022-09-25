<?php 

#Definimos los parametros para la conexion a la BD
define('HOST','localhost');
define('USUARIO','root');
define('PASS','');
define('NOMBRE_BD','actividad4bd');
define('PUERTO','3308');


#CONECTANDO A LA BD
$con=@mysqli_connect(HOST, USUARIO, PASS, NOMBRE_BD, PUERTO);

#EN CASO DE ERRORES
if (!$con) {
	die("Imposible conectarse: ".mysqli_error($con));

}
if(@mysqli_connect_errno()) {
	die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}

 ?>
