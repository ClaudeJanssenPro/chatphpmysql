<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° Debug °°°°°°°°°°°°°°°°°°°°°°°°°°
require_once('debug.php');
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB Connect °°°°°°°°°°°°°°°°°°°°°°°°°°
require_once('dbco.php');
session_start();
// °°°°°°°°°°°°°°°°°°°°°°°°°° Message addition °°°°°°°°°°°°°°°°°°°°°°°°°°
$user_id = $db->query('SELECT id FROM users WHERE email ="'.$_SESSION['email'].'"');
$author = $user_id->fetch();
// echo $author['id'];

if (isset($_POST['btn_msg'])){
  $message_n = trim($_POST['message']);
  $message_n = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
  if (!empty($message_n)) {
    $add_msg = $db->prepare('
      INSERT INTO messages (body, user)
      VALUES (?, ?)
    ');
    $add_msg->execute([
      $message_n,
      $author['id']
    ]);
  }
  unset($add_msg);
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
  <title>Envoi du message</title>
</head>
<body>
  <div class="messages">
    <fieldset>
      <legend><h1>Nouveaux message</h1></legend>
      <form class="msg_add" action="" method="post">
        <label for="desc">Je veux dire...</label>
        <textarea name="message" class="expanding" required></textarea>
        <button name="btn_msg" type="submit">Partage mon message</button>
      </form>
    </fieldset>
  </div>
</body>
</html>
