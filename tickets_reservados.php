<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservas</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            color: #FFFFFF;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h1 class="titulo">MIS RESERVAS</h1>
    <?php
    session_start();

    // Establecer conexión con la BD
    require 'conexion.php';

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit;
    }

    // Obtengo el usuario que ha iniciado sesión
    $idUsuario = $_SESSION['usuario'];

    // Consulto los datos de la reserva del usuario que inicia sesion uniendo las dos tablas
    $sql = "SELECT viaje.id_viaje, viaje.origen, viaje.destino, viaje.hora_salida
            FROM reserva
            INNER JOIN viaje ON reserva.id_viaje = viaje.id_viaje
            WHERE reserva.usuario = '$idUsuario'";
    $resultado = $mysqli->query($sql);

    //Muestro las reservas del usuario
    if (mysqli_num_rows($resultado) > 0) {
        echo "<table>";
        echo "<tr><th>ID viaje</th><th>Origen</th><th>Destino</th><th>Hora de salida</th></tr>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['id_viaje'] . "</td>";
            echo "<td>" . $fila['origen'] . "</td>";
            echo "<td>" . $fila['destino'] . "</td>";
            echo "<td>" . $fila['hora_salida'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
        echo "<h3>No hay reservas realizadas</h3>";
    }

    $mysqli->close();
    ?>

        <div style="display:inline-block; margin-right: 10px; padding:10px;">
            <a href="viaje.php" class="btn btn-primary">Volver</a>
        </div>
</body>
</html>
