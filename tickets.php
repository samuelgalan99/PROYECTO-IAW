<?php
// Verifico si se recibe un ID de viaje válido
if (isset($_GET["id"]) && !empty($_GET["id"])) {
  // Obtengo el ID del viaje seleccionado
  $viaje_id = $_GET["id"];

  // Establezco conexión
  require 'conexion.php';

  try {
    // Consultamos el viaje seleccionado
    $consulta_viaje = "SELECT * FROM viajes WHERE id = $viaje_id";
    $resultado_viaje = $mysqli->query($consulta_viaje);

    // Verifico si se encontró el viaje
    if ($resultado_viaje && $resultado_viaje->num_rows == 1) {
      // Obtenengo los datos del viaje
      $viaje = $resultado_viaje->fetch_assoc();
      $origen_destino = $viaje["origen_destino"];
      $horario = $viaje["horario"];

      // Inserto el ticket reservado en la tabla tickets
      $consulta_insertar = "INSERT INTO tickets (origen_destino, horario) VALUES ('$origen_destino', '$horario')";
      $resultado_insertar = $mysqli->query($consulta_insertar);

      if ($resultado_insertar) {
        // Eliminamos el viaje de la tabla viajes
        $consulta_eliminar = "DELETE FROM viajes WHERE id = $viaje_id";
        $resultado_eliminar = $mysqli->query($consulta_eliminar);

        if ($resultado_eliminar) {
          // Mostramos al usuario el ticket reservado
          echo "<!DOCTYPE html>";
          echo "<html>";
          echo "<head>";
          echo "<meta charset='UTF-8'>";
          echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
          echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
          echo "<title>Ticket Reservado</title>";
          echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>";
          echo "<style>";
          echo "body {";
          echo "background-color: #47ABDD;";
          echo "padding: 20px;";
          echo "}";
          echo "h2 {";
          echo "text-align: center;";
          echo "margin-bottom: 20px;";
          echo "color: #FFFFFF;";
          echo "}";
          echo "a {";
          echo "display: block;";
          echo "text-align: center;";
          echo "margin-top: 10px;";
          echo "margin-left: 10px;";
          echo "margin-right: 10px;";
          echo "}";
          echo "</style>";
          echo "</head>";
          echo "<body>";
          echo "<h2>Ticket Reservado:</h2>";
          echo "<div class='container'>";
          echo "<div class='row justify-content-center'>";
          echo "<div class='col-md-6'>";
          echo "<div class='card'>";
          echo "<div class='card-body'>";
          echo "<p><strong>Origen-Destino:</strong> " . $origen_destino . "</p>";
          echo "<p><strong>Horario:</strong> " . $horario . "</p>";
          echo "<a href='viajes.php' class='btn btn-primary'>Volver</a>";
          echo "<a href='tickets_reservados.php' class='btn btn-primary'>Ver todos los tickets reservados</a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</body>";
          echo "</html>";
        }
      }
    }
  } catch (Exception $e) {
    echo 'No se ha podido reservar su ticket: ', $e->getMessage();
    echo '<br><a href="viajes.php">Volver</a>';
  }

  // Cerrar conexión a la base de datos
  $mysqli->close();
} else {
  echo "El ID del viaje no es válido.";
}
?>