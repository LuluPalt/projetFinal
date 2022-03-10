<?php
	require('config.php');
	if(!isset($_POST['username']) || strlen($_POST['username']) < 5 || strlen($_POST['username']) > 25) {
		header('Location: signup.php?msg=Erreur : Le pseudo doit faire entre 5 et 25 caractères.');
		exit;
	}
	if(!isset($_POST['surname']) || strlen($_POST['surname']) < 2) {
		header('Location: signup.php?msg=Erreur : Veuillez entrer votre nom.');
		exit;
	}
	if(!isset($_POST['firstname']) || strlen($_POST['firstname']) < 2) {
		header('Location: signup.php?msg=Erreur : Veuillez entrer votre prenom.');
		exit;
	}
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		header('Location: signup.php?msg=Erreur : L\'email rentré est invalide.');
		exit;
	}
	if (!isset($_POST['password']) || strlen($_POST['password']) < 8 || strlen($_POST['password']) > 25) {
		header('Location: signup.php?msg=Erreur : Le mot de passe doit faire entre 8 et 25 caractères.');
		exit;
	}
	if(!isset($_POST['majority'])) {
		header('Location: signup.php?msg=Erreur : Veuillez préciser si vous êtes majeur ou non. Si ça n\'est pas le cas, pas de problème ! Vous pourrez toujours accéder à la plupart des fonctionnalités du site.');
		exit;
	}
	//vérification que le pseudo n'existe pas déjà dans la bdd
	$q = "SELECT username FROM USERS WHERE username = ?";
	$req = $bdd->prepare($q);
	$req->execute([$_POST['username']]);
	$results = $req->fetchAll();
	if (count($results) != 0){
		header('Location: signup.php?msg=Erreur : pseudo déjà utilisé');
		exit;
	}

	//vérification que l'email n'existe pas déjà dans la bdd
	$q = "SELECT email FROM USERS WHERE email = ?";
	$req = $bdd->prepare($q);
	$req->execute([$_POST['email']]);
	$results = $req->fetchAll();
	if (count($results) != 0){
		header('Location: signup.php?msg=Erreur : email déjà utilisé');
		exit;
	}


	$pseudo = htmlspecialchars($_POST['username']);
	$nom = htmlspecialchars($_POST['surname']);
	$prenom = htmlspecialchars($_POST['firstname']);
	$email = $_POST['email'];
	//hache le mdp selon la méthode algo "sha256"
	$password = hash('sha256', $_POST['password']);
	$majeur = ($_POST['majority'] == true) ? 1 : 0;
	$q = 'INSERT INTO USERS (username, surname, firstname, email, password, majority, roomCredits, itemCredits, activityCredits,  role, status) VALUES (:val1, :val2, :val3, :val4, :val5, :val6, :val7, :val8, :val9, :val10, :val11)';
	//requete preparee pour éviter l'injection de code
	$req = $bdd->prepare($q);
	$req->execute(
		[
			"val1" => $pseudo,
			"val2" => $nom,
			"val3" => $prenom,
			"val4" => $email,
			"val5" => $password,
			"val6" => $majeur,
			"val7" => 0,
			"val8" => 0,
			"val9" => 0,
			"val10" => "user",
			"val11" => TRUE
		]
	);


	//vérification de l'utilisateur par mail
	$head = "MIME-Version: 1.0\r\n";
	$head .= 'From: "Dusklight.org"<noreply@dusklight.org>' ."\n";
	$head .= 'Content-Type:text/html; charset=utf-8"'."\n";
	$head .= 'Content-Transfer-Encoding: 8bit';

	$message='
	<html>
		<body>
			<div align="center">
				Bonjour, <br><br>
				Vous avez récemment essayé de créer un compte sur le site https://www.dusklight.org. Cliquez<a href="http://dusklight.org/confirmation.php?username='.urlencode($pseudo).'">ici</a> pour confirmer votre mail !
				Si ce n\'est pas vous vous pouvez ignorer ce mail.

				Cordialement,
				L\'équipe Dusklight.org.
			</div>
		</body>
	</html>';

	mail($email, "Confirmez votre compte", $message, $head);
header("Location: index.php");
exit;
?>
