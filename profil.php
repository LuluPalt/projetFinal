<?php
	session_start();
	require('config.php');
  require('connexion_check_user.php');
      $q = "SELECT username, firstname, surname, role, email, roomCredits, itemCredits, activityCredits FROM USERS WHERE username = ?";
      $req = $bdd->prepare($q);
       $req->execute([$_SESSION['username']]);
	     $results = $req->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php include 'header.php' ?>
  <section>
      <div id="center">
        <h2>Profil de <?php echo $results[0]['username']; ?></h2>
        <br><br>
        Prénom : <?php echo $results[0]['firstname']; ?> 
        <br>
        Nom : <?php echo $results[0]['surname']; ?>
        <br>
        Mail = <?php echo $results[0]['email']; ?>
        <br>
        Crédits restants pour réserver une salle : <?php echo $results[0]['roomCredits']; ?>
        <br>
        Crédits restants pour réserver des équipements : <?php echo $results[0]['itemCredits']; ?>
        <br>
        Crédits restants pour aller à des activités : <?php echo $results[0]['activityCredits']; ?>
        <br>
        <a href="editprofil.php">Modifier votre profil</a>
        </div>

  </section>
</body>
</html>
