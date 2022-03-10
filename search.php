<?php
require('config.php');
if (isset($_GET['search'])) {

  $q = "SELECT id,title,userid FROM NEWS";
  $req = $bdd->prepare($q);
  $req->execute();
  $newsarray = $req->fetchAll();
//prépare pour après la vérification
  $q = "SELECT title,description,publishdate,userid FROM NEWS WHERE id = ?";
  $req = $bdd->prepare($q);
  $resultsbool = false; //sert à envoyer un message d'erreur si il n'y a pas de résultats
  $quser = "SELECT username FROM USERS WHERE username = ?";
  $requser = $bdd->prepare($quser);
  echo "<h2>Résultats pour ".$_GET['search']."</h2>";
  foreach ($newsarray as $news) {
    if (strpos($news['title'], $_GET['search']) !== false || strpos($news['userid'], $_GET['search']) !== false) {
      $resultsbool = true;
      $req->execute([$news['id']]);
      $res = $req->fetch();
      $requser->execute([$news['userid']]);
      $resuser = $requser->fetch();
      echo "<h3>".$res['title']."</h3>";
      echo "<h4>publié par ".$resuser['username']." le : ".$res['publishdate']."</h4>";
      echo "<p>".$res['description']."</p>";
    }
  }
  if ($resultsbool == false) {
    echo "Il n'y a pas d'actualités correspondant à votre recherche =/";
  }

}else {
  echo "no parameters received";
}
 ?>
