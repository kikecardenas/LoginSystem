
<?php
//conexion a la base de datos

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sesion';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
