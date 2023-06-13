<?php
 // Establezco la conexión a la BD
require 'conexion.php';

// Inicio de sesión
session_start();

// Recojo los datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // Si las credenciales son correctas, se encontró el usuario
    $fila = $resultado->fetch_assoc();
    $_SESSION['usuario'] = $fila['nombre']; // Almaceno el nombre de usuario en una variable de sesión

    // Redirigir al usuario a la página después del inicio de sesión exitoso
    header('Location: viaje.php');
    exit;
} else {
    // Si las credenciales son incorrectas, mostrar mensaje de error
    echo "<h1>Inicio de sesión incorrecto</h1>";
    echo "Usuario o contraseña incorrecta";
    echo '<br><a href="index.php">Volver al inicio</a>';
}
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
    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
