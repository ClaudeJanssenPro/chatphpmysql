<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° Debug °°°°°°°°°°°°°°°°°°°°°°°°°°
require_once('debug.php');
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB Connect °°°°°°°°°°°°°°°°°°°°°°°°°°
require_once('dbco.php');
// °°°°°°°°°°°°°°°°°°°°°°°°°° ShowMsgs °°°°°°°°°°°°°°°°°°°°°°°°°°
$messages = $db->query('SELECT * FROM messages LEFT JOIN users ON messages.user = users.id ORDER BY messages.id DESC');
?>
<meta http-equiv="Refresh" content="10" >
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Affichage des messages</title>
</head>
<body>
<ul class="items">
  <?php foreach ($messages as $message): ?>
  <li>
    <?= $message['user']; ?><br />
    <?= $message['body']; ?><br />
  </li>
  <?php endforeach; ?>
</ul>
</body>
</html>
