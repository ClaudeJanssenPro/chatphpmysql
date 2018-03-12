<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB Connect °°°°°°°°°°°°°°°°°°°°°°°°°°
require_once('dbco.php');
// °°°°°°°°°°°°°°°°°°°°°°°°°° Login && session start °°°°°°°°°°°°°°°°°°°°°°
if (isset($_POST['btn_login'])){
  $email_l = trim($_POST['email_login']);
  $email_l = filter_var($_POST['email_login'], FILTER_VALIDATE_EMAIL);
  $password_l = $_POST['pass_login'];
  $verifemail = $db->prepare('SELECT * FROM users WHERE email = ?');
  $verifemail ->execute([$_POST['email_login']]);
  $known = $verifemail->fetch();
  if ($known && password_verify($_POST['pass_login'], $known['pass']))
  {
    session_start();
    $_SESSION['email'] = $email_l;
    header("location: logout.php");
  }
  // else {
  //   echo $password_err;
  // }
}
  unset($verifemail);
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB DisConnect °°°°°°°°°°°°°°°°°°°°°°°°°°
unset($db);
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
      <form class="login_form" action="" method="post"  autocomplete="off">
        <h2 class="login_form_title">Bonjour O'ctochat,</h2></br>
        <strong>je voudrais participer,</h2></br>
        <label for="email_login">mon email est</label>
        <input type="email" name="email_login" placeholder="(ton email ici)" required></br>
        <label for="pass_login">et mon mot de passe est</label>
        <input type="password" name="pass_login" placeholder="(ton mot de passe ici)" required></br>
        <button name="btn_login" type="submit">Connecte-moi s'il-te-plaît</button>
        <p>Pas encore enregistrée? <a href="register.php">Faisons connaissance maintenant</a>.</p>
      </form>
    </fieldset>
  </body>
</html>
