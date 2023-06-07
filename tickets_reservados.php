<?php
// Establezco conexión
require 'conexion.php';

// Consultar los tickets reservados
$consulta_tickets = "SELECT * FROM tickets";
$resultado_tickets = $mysqli->query($consulta_tickets);

// Si hay tickets reservados
if ($resultado_tickets && $resultado_tickets->num_rows > 0) {
  // Los mostramos
  echo "<h1>Tickets Reservados</h1>";
  echo "<table>";
  echo "<tr><th>ID</th><th>Origen-Destino</th><th>Horarios</th></tr>";

  while ($ticket = $resultado_tickets->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $ticket["id"] . "</td>";
    echo "<td>" . $ticket["origen_destino"] . "</td>";
    echo "<td>" . $ticket["horario"] . "</td>";
    echo "</tr>";
    
  }

  echo "</table>";
  echo "<a href='viajes.php'>Volver a viajes</a>";
} else {
  echo "No se encontraron tickets reservados.";
}

$mysqli->close();
?>
