<?php
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("location: login.php");
  exit;
}

if (isset($_POST['btn_login'])){
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
      <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['email']); ?></b>. Welcome to our site.</h1>
  </div>
  <form class="logout_form" action="" method="post"  autocomplete="off">
    <p><input type="submit" name="logout" value="Déconnecte-moi"></p>
  </form>
</body>
</html>
