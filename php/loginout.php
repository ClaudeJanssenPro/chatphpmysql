<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° Imports && Session °°°°°°°°°°°°°°°°°°°°°°°°°°
require_once('debug.php');
require_once('dbco.php');
// °°°°°°°°°°°°°°°°°°°°°°°°°° User registration °°°°°°°°°°°°°°°°°°°°°°
if (isset($_POST['btn_login'])){
  $email_l = trim($_POST['email_login']);
  $email_l = filter_var($_POST['email_login'], FILTER_VALIDATE_EMAIL);
  $password_l = $_POST['pass_login'];
  $verifemail = $db->prepare('SELECT * FROM users WHERE email = ?');
  $verifemail ->execute([$_POST['email_login']]);
  $known = $verifemail->fetch();
  if ($known && password_verify($_POST['pass_login'], $known['pass']))
  {
      echo "valid!";
  } else {
      echo "invalid";
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Connection</title>
</head>
  <body>
    <fieldset>
      <form class="register_form" action="" method="post"  autocomplete="off">
        <h2 class="register_form_title">Bonjour O'ctochat,</h2>
        <label for="email_login">mon email est</label>
        <input type="email" name="email_login" placeholder="(rappelle-nous ton email ici)" required>
        <label for="pass_login">et mon mot de passe est</label>
        <input type="password" name="pass_login" placeholder="(rappelle-nous ton mot de passe ici)" required>
        <button name="btn_login" type="submit">Connecte-moi s'il-te-plaît</button>
      </form>
    </fieldset>
  </body>
</html>
