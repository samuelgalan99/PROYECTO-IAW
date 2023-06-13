<?php
    //Establezco la conexion a la BD
    require 'conexion.php';
    //Me traigo todos los datos de la tabla login
    $sql = "SELECT * FROM usuarios";
    // Ejecuto la sentencia y guardo el resultado
    $resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #47ABDD;
            padding: 20px;
        }
        
        .container {
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .btn {
            width: 100%;
        }
        a {
            color:#FFFFFF;
        }
        a:hover{
            color:#FFFFFF;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <?php
            //Recojo los datos y creo una nueva variable a false
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            $encontrado = false;
            //Con este bucle indico que mientras existan datos y encontrado esté a false siga el bucle.
            while (($fila = $resultado->fetch_assoc()) && ($encontrado == false)) {
                if ($usuario == $fila['usuario'] && $contraseña == $fila['contraseña']) {
                    //Si hay coincidencia imprimo el nombre y pongo encontrado a true para finalizar el bucle
                    $encontrado = true;
                    echo "<h1>Inicio de sesión correcto</h1>";
                    echo "Bienvenido ", $fila['nombre'];
                    echo '<br><a href="viaje.php">Reservar un viaje</a>';
                    echo '<br><a href="index.php">Volver</a>';
                } else {
                    $encontrado = false;
                }
            }
            // Si no se accede con un usuario de la BD inserto el error.
            if ($encontrado == false) {
                echo "Usuario o contraseña incorrecta <br>";
                echo '<a href="index.php">Volver al inicio</a>';
            }
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
