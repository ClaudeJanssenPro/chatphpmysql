<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° ToDO °°°°°°°°°°°°°°°°°°°°°°°°°°

// °°°°°°°°°°°°°°°°°°°°°°°°°° ToDO °°°°°°°°°°°°°°°°°°°°°°°°°°
// require "php/toolbox.php";
// °°°°°°°°°°°°°°°°°°°°°°°°°° Session °°°°°°°°°°°°°°°°°°°°°°°°°°
session_start();
$_SESSION['login'] = 'visiteur';
 echo $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/phpchatdb_style.css" charset="utf-8" />
  <title>O'cto Chat</title>
</head>
<body>
  <iframe src="php/messages.php" name="messages"></iframe>
  <iframe src="php/form_reg" name="register"></iframe>
</body>
</html>
