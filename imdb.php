<?php
  // °°°°°°°°°°°°°°°°°°°°°°°°°° Debug °°°°°°°°°°°°°°°°°°°°°°°°°°
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // °°°°°°°°°°°°°°°°°°°°°°°°°° DB HookUp °°°°°°°°°°°°°°°°°°°°°°°°°°
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=imbd;charset=utf8', 'root', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }

  // °°°°°°°°°°°°°°°°°°°°°°°°°° DB Queries, Fetch & Display °°°°°°°°°°°°°°°°°°°°°°°°°°
  // Dans un fichier php, affiche à l'aide d'un print_r() les résultats suivants.
  // OK Affiche uniquement les films de "Cristopher Nolan" :
  // OK Avec l'aide de l'image ci-dessous, utilise un "LEFT JOIN" et affiche TOUTES les valeurs de la table authors.
  // OK Affiche TOUTES les valeurs qui se trouvent dans la table authors et movies
  // OK Affiche uniquement les valeurs qui n'ont pas de correspondances entres les tables. (Donc le résultat devrait être "Tintin en Amérique" et "Yves Lavandier".)
  // OK Affiche uniquement les valeurs qui n'ont pas de correspondances avec la table authors. Donc le résultat devrait être "Tintin en Amérique"
  // Modifie dans la rangée "Tintin en Amérique" en "Tintin et le secret de la licorne" et
  // modifie l'id de l'auteur avec celui de "Steven Spielberg".
  // https://github.com/becodeorg/Turing-promo-4/raw/master/parcours/3-MySQL/assets/left-inner-join.jpeg

  $nolan = $db->query('SELECT title FROM movies INNER JOIN authors ON movies.id_author = authors.id WHERE authors.lastname ="Nolan"');
  $ljoin = $db->query('SELECT * FROM authors LEFT JOIN movies ON authors.id = movies.id_author');
  $unionall = $db->query('SELECT * FROM authors LEFT JOIN movies ON authors.id = movies.id_author UNION ALL SELECT * FROM movies LEFT JOIN authors ON movies.id_author = authors.id');
  $uniondis = $db->query('SELECT * FROM authors LEFT JOIN movies ON authors.id = movies.id_author WHERE movies.id_author IS NULL UNION ALL SELECT * FROM movies LEFT JOIN authors ON movies.id_author = authors.id  WHERE authors.id IS NULL');
  $aisnull = $db->query('SELECT * FROM movies LEFT JOIN authors ON authors.id = movies.id_author WHERE authors.id IS NULL');
  $modauthor = $db->query('UPDATE movies SET movies.id_author = (SELECT id FROM authors WHERE authors.lastname ="Spielberg"), title = "Tintin et le secret de la licorne" WHERE movies.title = "Tintin en Amérique"');
  $modcheck = $db->query('SELECT title, id_author FROM movies WHERE movies.title = "Tintin et le secret de la licorne"');

  $fetch_nolan = $nolan->fetchAll(PDO::FETCH_ASSOC);
  $fetch_ljoin = $ljoin->fetchAll(PDO::FETCH_ASSOC);
  $fetch_unionall = $unionall->fetchAll(PDO::FETCH_ASSOC);
  $fetch_uniondis = $uniondis->fetchAll(PDO::FETCH_ASSOC);
  $fetch_aisnull = $aisnull->fetchAll(PDO::FETCH_ASSOC);
  $fetch_modcheck = $modcheck->fetchAll(PDO::FETCH_ASSOC);

  echo "<h1>Films de Chuck Nolan</h1>";
  echo '<pre>';
  print_r ($fetch_nolan);
  echo '</pre>';
  echo '<hr>';
  echo '<br>';
  echo "<h1>Left Join</h1>";
  echo '<pre>';
  print_r ($fetch_ljoin);
  echo '</pre>';
  echo '<hr>';
  echo '<br>';
  echo "<h1>Union All</h1>";
  echo '<pre>';
  print_r ($fetch_unionall);
  echo '</pre>';
  echo '<hr>';
  echo '<br>';
  echo "<h1>Union Distinct</h1>";
  echo '<pre>';
  print_r ($fetch_uniondis);
  echo '</pre>';
  echo '<hr>';
  echo '<br>';
  echo "<h1>Is null</h1>";
  echo '<pre>';
  print_r ($fetch_aisnull);
  echo '</pre>';
  echo '<hr>';
  echo '<br>';
  echo "<h1>Tintin mod</h1>";
  echo '<pre>';
  print_r ($fetch_modcheck);
  echo '</pre>';
  echo '<hr>';
  echo '<br>';
 ?>
