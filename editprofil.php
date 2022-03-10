<?php
	session_start();
	require('config.php');
	require('connexion_check_user.php');
		$q = "SELECT username, firstname, surname, email FROM USERS WHERE username = ?";
		$req = $bdd->prepare($q);
		$req->execute([$_SESSION['username']]);
		$results = $req->fetchAll();

		if(isset($_POST['newusername']) && !empty($_POST['newusername']) && $_POST['newusername'] != $user['username'])
		{	
			$q = "SELECT username FROM USERS WHERE username = ?";
			$req = $bdd->prepare($q);
			$req->execute([$_POST['username']]);
			$results = $req->fetchAll();
			if (count($results) != 0){
			header('Location: editprofil.php?msg=Erreur : pseudo déjà utilisé');
			exit;
			}else{
			$newusername = htmlentities($_POST['newusername']);
			$insertusername = $bdd->prepare("UPDATE USERS SET username = ? WHERE username = ?");
			$insertusername->execute(array($newusername, $_SESSION['username']));
			$_SESSION['username'] = $newusername;
			header('Location: profil.php');}
		}

		if(isset($_POST['newemail']) && !empty($_POST['newemail']) && $_POST['newemail'] != $user['email'])
		{
			$q = "SELECT email FROM USERS WHERE email = ?";
			$req = $bdd->prepare($q);
			$req->execute([$_POST['email']]);
			$results = $req->fetchAll();
			if (count($results) != 0){
			header('Location: editprofil.php?msg=Erreur : email déjà utilisé');
			exit;
			}
			else{
			$newemail = htmlentities($_POST['newemail']);
			$insertemail = $bdd->prepare("UPDATE USERS SET email = ? WHERE username = ?");
			$insertemail->execute(array($newemail, $_SESSION['username']));
			$_SESSION['email'] = $newemail;
			header('Location: profil.php');
			}
		}

		if(isset($_POST['newmdp1']) && !empty($_POST['newmdp1']) && isset($_POST['newmdp2']) && !empty($_POST['newmdp2']))
		{
			$mdp1 = hash('sha256', $_POST['newmdp1']);
			$mdp2 = hash('sha256', $_POST['newmdp2']);

			if ($mdp1 == $mdp2) {
				$insertmdp = $bdd->prepare("UPDATE USERS SET password = ? WHERE username = ?");
				$insertmdp->execute(array($mdp1, $_SESSION['username']));
				header('Location: profil.php');
			}
			else{
				$msg = "Vos mots de passe ne correspondent pas !";
			}
		}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Modification du profil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php include 'header.php' ?>
  <section>
      <div id="center">
        <h2>Modification du profil de <?php echo $results[0]['username']; ?></h2>
        <form method="POST" action="">
        	<label>Pseudo :</label>
        	<input type="text" name="newusername" placeholder="Pseudo" value="<?php echo $results[0]['username']; ?>"> <br><br>
        	<label>Email :</label>
        	<input type="text" name="newemail" placeholder="Email" value="<?php echo $results[0]['email']; ?>"> <br><br>
        	<label>Mot de passe :</label>
        	<input type="password" name="newmdp1" placeholder="Mot de passe"> <br><br>
        	<label>Confirmation du mot de passe :</label>
        	<input type="password" name="newmdp2" placeholder="Confirmation mot de passe"> <br><br>
        	<input type="submit" value="Mettre à jour mon profil"> 
        </form>
   	  </div>
        <?php if(isset($msg)) { echo htmlentities($msg); } ?>
  </section>
</body>
</html>
