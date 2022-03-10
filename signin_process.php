<?php
require('config.php');
$username = (isset($_POST['username']))? $_POST['username'] : '';
$password = (isset($_POST['password']))? $_POST['password'] : '';
$today = date("Y-m-d");
$q = "SELECT username, role, status FROM USERS WHERE username = ? AND password = ?";
$req = $bdd->prepare($q);
$req->execute([$username, hash('sha256',$password)]);
$results = $req->fetchAll();
if (count($results) == 0){
	header('Location: signin.php?msg=Erreur : pseudo ou mot de passe invalide');
	exit;
}
else{
	if($results[0]['status'] == 0){
		header('Location: signin.php?msg=Erreur : votre compte n\'est pas confirmé, veuillez vérifier vos mails.');
		exit;
	}else{
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['role'] = $results[0]['role'];
	$q = 'INSERT INTO tracking (date, amount) VALUES (:val1, :val2) on DUPLICATE KEY UPDATE amount = amount + 1';
	$req = $bdd->prepare($q);
	$req->execute(
		[
			"val1" => $today,
			"val2" => 1,
		]
	);
	header('Location: index.php');
	exit;
	}
}
?>
