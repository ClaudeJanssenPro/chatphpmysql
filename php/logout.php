<?php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("location: login.php");
  exit;
}
if (isset($_POST['btn_logout'])){
  session_start();
  $_SESSION = array();
  session_destroy();
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Déconnection</title>
</head>
<body>
  <div class="page-header">
      <h1>Bienvenu <?= htmlspecialchars($_SESSION['email']); ?>.</h1>
  </div>
  <form class="logout_form" action="" method="post" autocomplete="off">
    <p><input type="submit" name="btn_logout" value="Déconnecte-moi s'il-te-plaît."></p>
  </form>
</body>
</html>
