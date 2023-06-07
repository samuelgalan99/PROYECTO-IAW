<?php
// Establezco conexión
require 'conexion.php';

// Consultar los tickets reservados
$consulta_tickets = "SELECT * FROM tickets";
$resultado_tickets = $mysqli->query($consulta_tickets);

// Si hay tickets reservados
if ($resultado_tickets && $resultado_tickets->num_rows > 0) {
  // Los mostramos
  echo "<!DOCTYPE html>";
  echo "<html>";
  echo "<head>";
  echo "<meta charset='UTF-8'>";
  echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
  echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
  echo "<title>Tickets Reservados</title>";
  echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>";
  echo "<style>";
  echo "body {";
  echo "    background-color: #47ABDD;";
  echo "    padding: 20px;";
  echo "}";
  echo "h1 {";
  echo "    text-align: center;";
  echo "    margin-bottom: 20px;";
  echo "    color: #007bff;";
  echo "}";
  echo "table {";
  echo "    width: 100%;";
  echo "    border-collapse: collapse;";
  echo "    margin-bottom: 20px;";
  echo "}";
  echo "table th,";
  echo "table td {";
  echo "    padding: 8px;";
  echo "    text-align: left;";
  echo "    border-bottom: 1px solid #dee2e6;";
  echo "}";
  echo "a {";
  echo "    display: block;";
  echo "    text-align: center;";
  echo "    margin-top: 10px;";
  echo "}";
  echo "</style>";
  echo "</head>";
  echo "<body>";
  echo "<h1>Tickets Reservados</h1>";
  echo "<div class='container'>";
  echo "<table class='table'>";
  echo "<thead class='thead-dark'>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Origen-Destino</th>";
  echo "<th>Horarios</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  while ($ticket = $resultado_tickets->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $ticket["id"] . "</td>";
    echo "<td>" . $ticket["origen_destino"] . "</td>";
    echo "<td>" . $ticket["horario"] . "</td>";
    echo "</tr>";
  }

  echo "</tbody>";
  echo "</table>";
  echo "<a href='viajes.php' class='btn btn-primary'>Volver a viajes</a>";
  echo "</div>";
  echo "</body>";
  echo "</html>";
} else {
  echo "No se encontraron tickets reservados.";
}

$mysqli->close();
?>
