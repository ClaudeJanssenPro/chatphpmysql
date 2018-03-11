<?php
// °°°°°°°°°°°°°°°°°°°°°°°°°° Definitions °°°°°°°°°°°°°°°°°°°°°°°°°°
  $host = "localhost";
  $dbname = "phpchat";
  $charset = "utf8mb4";
  $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
  $user = "root";
  $pass = "root";
  $opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];
// °°°°°°°°°°°°°°°°°°°°°°°°°° HookUp °°°°°°°°°°°°°°°°°°°°°°°°°°
  try
  {
    $db = new PDO($dsn, $user, $pass, $opt);
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
?>
