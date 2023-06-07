<?php
//Nueva conexion de la clase mysqli
//Parametros: ubicacion del servidor, nombre de usuario, contraseña, base de datos.
$mysqli = new mysqli("localhost", "root", "", "proyecto");
if($mysqli->connect_errno){
    echo "Fallo al conectar a MySQL: (", $mysqli->connect_errno, ") ", $mysqli->connect_error;
}

?>