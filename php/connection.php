<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB HookUp °°°°°°°°°°°°°°°°°°°°°°°°°°
  $dbserver = "localhost";
  $dbname = "phpchat";
  $dbusername = "root";
  $dbpassword = "root";
  try
  {
    $dbco = new PDO("mysql:host=$dbserver;dbname=$dbname;charset=utf8", $dbusername, $dbpassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
?>
