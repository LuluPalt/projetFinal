<?php
  session_start();
  require('connexion_check_admin.php');
  require('config.php');

  $q = "SELECT name FROM TAGS";
  $req = $bdd->prepare($q);
  $req->execute();
  $tags = $req->fetchAll();
  $q = "SELECT title, description, publishDate FROM NEWS WHERE id = ?";
  $req = $bdd->prepare($q);
   ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion des Actualités</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <script src="ajax.js" charset="utf-8"></script>
    <h2>Sélectionnez les tags concernés</h2>
      <form action="ajax.php" method="post">
        <?php
        foreach ($tags as $key => $value) {
          echo "<input type='checkbox' name='tag' value='" . $tags['name'] . "'>";
        }
        ?>
      </form>

      <ul id='news'>

      </ul>
    <?php  $req->execute(/**/);
    $news = $req->fetchAll(); ?>


  </body>
</html>
