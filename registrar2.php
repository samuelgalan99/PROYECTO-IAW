<?php
    //Establezco conexion con la BD
    require 'conexion.php';
    //Me traigo todos los datos de la tabla usuarios
    $sql = "SELECT * FROM usuarios";
    // Ejecuto la sentencia y guardo el resultado
    $resultado = $mysqli->query($sql);

    //Obtengo los datos del formulario
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Verifico si el nombre de usuario ya existe
    $verificar_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado_verificacion = $mysqli->query($verificar_usuario);

    if ($resultado_verificacion->num_rows > 0) {
        // Si se devuelve mas de una columna, el usuario ya existe, muestro el mensaje de error
        ?>
        <div class="container">
        <p class="success-message">El usuario que intenta crear ya existe, por favor, pruebe con otro.</p>
        <a href="registrar.php" class="back-link">Volver</a>
    </div>
    <?php
    } else {
        // Si el usuario no existe, inserto los datos en la tabla
        $sql = "INSERT INTO usuarios (nombre, usuario, contraseña) VALUES ('$nombre', '$usuario', '$contraseña')";

        // Y ejecuto la sentencia try catch
        try {
            $resultado = $mysqli->query($sql);
            // Muestro el mensaje de registro completado
            ?>
            <div class="container">
            <p class="success-message">Registro completado, puede volver a la página principal para iniciar sesión con su usuario.</p>
            <a href="index.php" class="back-link">Volver</a>
            </div>
            <?php
        } catch (Exception $e) {
            echo "No se ha podido crear su nuevo usuario: ", $e->getMessage();
            echo '<br><a href="registrar.php">Volver</a>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
