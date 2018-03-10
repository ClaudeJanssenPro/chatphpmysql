<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° Debug °°°°°°°°°°°°°°°°°°°°°°°°°°
ini_set('display_errors', 1);
error_reporting(E_ALL);
// °°°°°°°°°°°°°°°°°°°°°°°°°° ToDO °°°°°°°°°°°°°°°°°°°°°°°°°°
require('connection.php');
// require('toolbox.php');
session_start();
// °°°°°°°°°°°°°°°°°°°°°°°°°° User registration °°°°°°°°°°°°°°°°°°°°°°
if (isset($_POST['btn_reg'])){
  $email = trim($_POST['email_reg']);
  $email = filter_var($_POST['email_reg'], FILTER_VALIDATE_EMAIL);
  $password = $_POST['pass_reg'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (!empty($email)&&!empty($password)) {
    $add_user = $dbco->prepare('
      INSERT INTO users (email, pw)
      VALUES (?, ?)
    ');
    $add_user->execute([
      $email,
      $hashed_password
    ]);
  }
  var_dump($hashed_password);
  echo '<pre>';
  print_r ($email);
  echo '</pre>';
  echo '<br>';
  echo '<pre>';
  print_r ($password);
  echo '</pre>';
  echo '<br>';
  echo $email;
  echo '<br>';
  echo $password;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enregistrement</title>
</head>
  <body>
    <fieldset>
      <form class="register_form" action="" method="post">
        <h2 class="register_form_title">Bonjour O'ctochat,</h2>
        <label for="email_reg">mon email est</label>
        <input type="email" name="email_reg" placeholder="(écris ton email ici)" required>
        <label for="pass_reg">et mon mot de passe est</label>
        <input type="password" name="pass_reg" placeholder="(définis ton mot de passe ici)" required>
        <button name="btn_reg" type="submit">Enregistre tout ça s'il-te-plaît.</button>
      </form>
    </fieldset>
  </body>
</html>
<!-- Check autocomplete -->
