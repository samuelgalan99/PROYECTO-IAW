<?php
    //Establezco la conexion a la BD
    require 'conexion.php';
    //Me traigo todos los datos de la tabla login
    $sql= "Select * from login";
    // Ejecuto la sentencia y guardo el resultado
    $resultado= $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
    <body>
        <?php
        //Recojo los datos y creo una nueva variable a false
            $usuario=$_POST['usuario'];
            $contraseña=$_POST['contraseña'];
            $encontrado=false;
            //Con este bucle indico que mientras existan datos y encontrado esté a false siga el bucle.
            while(($fila = $resultado->fetch_assoc()) && ($encontrado==false)){
                if ($usuario == $fila['usuario'] && $contraseña == $fila['contraseña']){
                    //Si hay coincidencia imprimo el nombre y pongo encontrado a true para finalizar el bucle
                        $encontrado=true;
                        echo "Bienvenido ", $fila['nombre'];
                        echo ' <br><a href="viajes.php">Reservar un viaje</a>';
                    }else{
                        $encontrado=false;
                    }
                }
                // Si no se accede con un usuario de la BD inserto el error.
                if ($encontrado==false){
                    echo "Usuario o contraseña incorrecta <br>";
                    echo '<a href="index.php">Volver al inicio</a>';
                }
           
        
?>

    </body>
</html>