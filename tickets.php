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
          echo "Ticket reservado con éxito.<br>";
          echo "<h2>Ticket Reservado:</h2>";
          echo "Origen-Destino: " . $origen_destino . "<br>";
          echo "Horario: " . $horario . "<br>";

          echo "<br>";
          echo "<a href='viajes.php'>Volver</a>";
          echo "<a href='tickets_reservados.php'>Ver todos los tickets reservados</a>";
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
  echo "ID de viaje inválido.";
}
?>





