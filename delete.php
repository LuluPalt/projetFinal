<?php 

	require('config.php');

	if(isset($_GET['id']) AND !empty($_GET['id'])) {
		echo "salut";
		$suppr_id = htmlspecialchars($_GET['id']);
		$q = "DELETE FROM NEWS WHERE id = ?";
		$suppr = $bdd->prepare($q);
		$suppr->execute(array($suppr_id));

		header('Location: news.php');
	}