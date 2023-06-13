<?php
// Establezco conexión con la BD
require 'conexion.php';
// Me traigo todos los datos de la tabla login
$sql = "SELECT * FROM viaje";
// Ejecuto la sentencia y guardo el resultado
$resultado = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIAJES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
    <h1 class="titulo">VIAJES SAMUELIYOTOUR</h1>

    <?php
    // Verificamos si se encontraron viajes
    if (mysqli_num_rows($resultado) > 0) {
        // Mostramos los viajes existentes
        echo "<table>";
        echo "<tr><th>ID</th><th>Origen</th><th>Destino</th><th>Hora salida</th><th>Plazas</th><th>Reservas</th></tr>";

        while ($col = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $col["id_viaje"] . "</td>";
            echo "<td>" . $col["origen"] . "</td>";
            echo "<td>" . $col["destino"] . "</td>";
            echo "<td>" . $col["hora_salida"] . "</td>";
            echo "<td>" . $col["plazas"] . "</td>";
            echo "<td><a href='tickets.php?id=" . $col["id_viaje"] . "' class='btn btn-primary'>Reservar</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron viajes disponibles.";
    }
    echo "<a href='index.php' class='btn btn-primary'>Volver</a>";
    // Cerrar conexión a la base de datos
    $mysqli->close();
    ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>

