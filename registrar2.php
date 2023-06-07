<?php
    //Establezco conexion con la BD
    require 'conexion.php';
    //Me traigo todos los datos de la tabla login
    $sql= "Select * from login";
    // Ejecuto la sentencia y guardo el resultado
    $resultado= $mysqli->query($sql);

    //Obtengo los datos del formulario
    $nombre=$_POST['nombre'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    
    // Insertamos los datos obtenidos en la tabla
    $sql= "insert into login (nombre,usuario,contraseña) values ('$nombre','$usuario','$contraseña')";
    
    //Ejecuto la sentencia(try|catch)
    try{
        $resultado = $mysqli->query($sql);
        echo 'Registro completado, ahora puede volver para iniciar sesión con su nuevo usuario. <br>';
        echo '<a href="index.php">Volver</a>';
     //En el caso de que de error, se guarda en $e y lo mostramos por pantalla con getMessage
    }catch (Exception $e){
        echo 'No se ha podido crear su nuevo usuario: ', $e->getMessage();
        echo '<br><a href="registrar.php">Volver</a>';
    }

?>