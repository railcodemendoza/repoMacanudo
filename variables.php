<?php


$conn2 = mysqli_connect(
 '193.203.175.53',
 'u101685278_api_macanudas',
 'Rail2023$',
 'u101685278_api_macanudas'
);

if (!$conn2) {
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
  echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

  $query_variables = "SELECT * FROM `variables` ";
  $rv = mysqli_query($conn2, $query_variables);
  while ($rowv = mysqli_fetch_assoc($rv)) {
  
  $urlApi = 'http://127.0.0.1:8000';

}
