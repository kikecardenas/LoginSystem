<?php
/*Sistema de Sesion
Trabajo practico 2
Luis Enrique Cardenas Sinaca - 154630 */

  session_start();

  require 'connection.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema de Sesion</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'front/home.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>
      <a href="logout.php">
        Cerrar Sesion
      </a>
    <?php else: ?>
      <h1>Inicia sesion o Registrate</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">Registrarse</a>
    <?php endif; ?>
  </body>
</html>
