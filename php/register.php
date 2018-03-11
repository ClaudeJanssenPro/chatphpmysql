<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB Connect °°°°°°°°°°°°°°°°°°°°°°°°°°
require_once('dbco.php');
// °°°°°°°°°°°°°°°°°°°°°°°°°° User registration °°°°°°°°°°°°°°°°°°°°°°
if (isset($_POST['btn_reg'])){
  $email_r = trim($_POST['email_reg']);
  $email_r = filter_var($_POST['email_reg'], FILTER_VALIDATE_EMAIL);
  $password_r = $_POST['pass_reg'];
  $hashed_password = password_hash($password_r, PASSWORD_DEFAULT);
    if (!empty($email_r)&&!empty($password_r)) {
    $add_user = $db->prepare('
      INSERT INTO users (email, pass)
      VALUES (?, ?)
    ');
    $add_user->execute([
      $email_r,
      $hashed_password
    ]);
    header("location: loginout.php");
  }
  unset($add_user);
}
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB DisConnect °°°°°°°°°°°°°°°°°°°°°°°°°°
unset($db);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enregistrement</title>
</head>
  <body>
    <fieldset>
      <form class="register_form" action="" method="post"  autocomplete="off">
        <h2 class="register_form_title">Bonjour O'ctochat,</h2>
        <label for="email_reg">mon email est </label>
        <input type="email" name="email_reg" placeholder="(apprends-nous ton email ici)" required>
        <label for="pass_reg">et mon mot de passe est </label>
        <input type="password" name="pass_reg" placeholder="(définis ton mot de passe ici)" required>
        <button name="btn_reg" type="submit">enregistre-moi s'il-te-plaît.</button>
      </form>
    </fieldset>
  </body>
</html>
