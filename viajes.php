<?php
//Establezco conexion con la BD
    require 'conexion.php';
    //Me traigo todos los datos de la tabla login
    $sql= "Select * from viajes";
    // Ejecuto la sentencia y guardo el resultado
    $resultado= $mysqli->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h1>VIAJES SAMUELIYOTOUR</h1>

  <?php
  // Verificamos si se encontraron viajes
  if (mysqli_num_rows($resultado) > 0) {
    // Mostramos los viajes existentes
    echo "<table>";
    echo "<tr><th>ID</th><th>Origen-Destino</th><th>Horarios</th><th>Reservas</th></tr>";

    while ($col = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td>" . $col["id"] . "</td>";
      echo "<td>" . $col["origen_destino"] . "</td>";
      echo "<td>" . $col["horario"] . "</td>";
      echo "<td><a href='tickets.php?id=" . $col["id"] . "'>Reservar</a></td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "No se encontraron viajes disponibles.";
  }

  // Cerrar conexión a la base de datos
  $mysqli -> close();
  ?>
</body>
</html>
