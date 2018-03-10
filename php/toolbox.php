<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° ToDO °°°°°°°°°°°°°°°°°°°°°°°°°°
// OK Upload DB on GitHub
// !!!Pick Up Your Debug Code On Your Way Out!!!!
// °°°°°°°°°°°°°°°°°°°°°°°°°° Debug °°°°°°°°°°°°°°°°°°°°°°°°°°
ini_set('display_errors', 1);
error_reporting(E_ALL);
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB HookUp °°°°°°°°°°°°°°°°°°°°°°°°°°
// try
// {
//   $db = new PDO('mysql:host=localhost;dbname=phpchat;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// }
// catch(Exception $e)
// {
//   die('Erreur : '.$e->getMessage());
// }
// °°°°°°°°°°°°°°°°°°°°°°°°°° User registration °°°°°°°°°°°°°°°°°°°°°°°°°°
if (isset($_POST['btn_reg'])){
  $email = trim($_POST['email_reg']);
  $email = filter_var($_POST['email_reg'], FILTER_VALIDATE_EMAIL);
  $password = trim($_POST['pass_reg']);
  $password = filter_var($_POST['pass_reg'], FILTER_VALIDATE_EMAIL);
  if (!empty($email)&&!empty($password)) {
    $add_user = $dbco->prepare('
      INSERT INTO users (email, pw)
      VALUES (?, ?)
    ');
    $add_user->execute([
      $email,
      $password
    ]);
  }
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
