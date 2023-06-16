<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
                background-color: #47ABDD;
                padding: 20px;
            }
        .titulo {
                text-align: center;
                margin-bottom: 20px;
                font-size: 36px;
                font-weight: bold;
                color: #007bff;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 1.5);
        }    

</style>
</head>
<body>
<?php
session_start();

// Establecer conexión con la BD
require 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    // Redirigir al usuario al inicio de sesión si no ha iniciado sesión
    header('Location: index.php');
    exit;
}

if (isset($_GET['id'])) {
    $idviaje = $_GET['id'];

    // Obtener los datos del viaje seleccionado
    $sql = "SELECT * FROM viaje WHERE id_viaje = $idviaje";
    $resultado = $mysqli->query($sql);

    if (mysqli_num_rows($resultado) > 0) {
        $viaje = mysqli_fetch_assoc($resultado);

        // Verifico si hay plazas disponibles
        if ($viaje['plazas'] > 0) {
            // Si hay plazas disponibles, resto -1 al total
            $plazas_disponibles = $viaje['plazas'] - 1;

            // Actualizo el numero de plazas totales en la tabla
            $sql_update = "UPDATE viaje SET plazas = $plazas_disponibles WHERE id_viaje = $idviaje";
            $mysqli->query($sql_update);

            // Obtenengo el usuario que ha iniciado sesion
            $id_usuario = $_SESSION['usuario'];

            // Inserto los datos de la reserva en la tabla
            $sql_insert = "INSERT INTO reserva (usuario, id_viaje) VALUES ('$id_usuario', '$idviaje')";
            $mysqli->query($sql_insert);

            // Muestro el ticket reservado
            echo "<div>";
            echo "<h1 class='titulo'>TICKET RESERVADO</h1>";
            echo "<h4>Has reservado tu asiento en el siguiente viaje:</h4>";
            echo "<li class='list-group-item'><strong>ID viaje:</strong> " . $viaje["id_viaje"] . "</li>";
            echo "<li class='list-group-item'><strong>Origen:</strong> " . $viaje["origen"] . "</li>";
            echo "<li class='list-group-item'><strong>Destino:</strong> " . $viaje["destino"] . "</li>";
            echo "<li class='list-group-item'><strong>Hora de Salida:</strong> " . $viaje["hora_salida"] . "</li>";
            echo "</div>";
?>
            <div style="display:inline-block; margin-right: 10px; padding:10px;">
                <a href="viaje.php" class="btn btn-primary">Volver</a>
            </div>

            <div style="display:inline-block; margin-left: 0px;">
                <a href="tickets_reservados.php" class="btn btn-primary">Mis reservas</a>
            </div>
<?php
        } else {
            echo "<h3>Plazas agotadas</h3>";
            echo "<div style='display:inline-block; margin-right: 10px; padding:10px;'>";
                echo "<a href='viaje.php' class='btn btn-primary'>Volver</a>";
            echo "</div>";

        }
    } else {
        echo "<h3>Viaje no encontrado</h3>";
    }
}

$mysqli->close();
?>
