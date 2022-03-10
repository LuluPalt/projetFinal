<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	require('config.php');
	if(isset($_GET['username']) && !empty($_GET['username'])) {
	$q = "SELECT username, status FROM USERS WHERE username = ?";
	$req = $bdd->prepare($q);
	$req->execute([$_GET['username']]);
	$results = $req->fetchAll();
	$pseudo = htmlspecialchars(urldecode($_GET['username']));

	if(count($results) != 0){
		if($results[0]['status'] == 0){
			$updateuser = $bdd->prepare("UPDATE USERS SET status = 1 WHERE username = ?");
			$updateuser->execute(array($pseudo));
			echo "Votre compte a bien été confirmé";
		}else {
			echo "Votre compte a déjà été confirmé.";
		}
	}else{
		echo "L'utilisateur n'existe pas !";
	}
} 
?>
</body>
</html>