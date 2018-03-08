<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° DB HookUp °°°°°°°°°°°°°°°°°°°°°°°°°°
try
{
  $db = new PDO('mysql:host=localhost;dbname=phpchat;charset=utf8', 'root', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
?>
