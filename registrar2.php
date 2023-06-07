<?php
    //Establezco conexion con la BD
    require 'conexion.php';
    //Me traigo todos los datos de la tabla login
    $sql = "SELECT * FROM login";
    // Ejecuto la sentencia y guardo el resultado
    $resultado = $mysqli->query($sql);

    //Obtengo los datos del formulario
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
    // Insertamos los datos obtenidos en la tabla
    $sql = "INSERT INTO login (nombre, usuario, contraseña) VALUES ('$nombre', '$usuario', '$contraseña')";
    
    //Ejecuto la sentencia (try|catch)
    try {
        $resultado = $mysqli->query($sql);
        
     //En el caso de que de error, se guarda en $e y lo mostramos por pantalla con getMessage
    } catch (Exception $e) {
        echo 'No se ha podido crear su nuevo usuario: ', $e->getMessage();
        echo '<br><a href="registrar.php">Volver</a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Completado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #47ABDD;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .success-message {
            color: #28a745;
            text-align: center;
            margin-bottom: 10px;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro Completado</h1>
        <p class="success-message">Registro completado, ahora puede volver para iniciar sesión con su nuevo usuario.</p>
        <a href="index.php" class="back-link">Volver</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
