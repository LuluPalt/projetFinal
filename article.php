<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


	require('config.php');

	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		
		$get_id = htmlspecialchars($_GET['id']);
		$q = "SELECT * FROM NEWS WHERE id = ?";
		$article = $bdd->prepare($q);
		$article->execute(array($get_id));

		if($article->rowCount() == 1) {
			$article = $article->fetch();
			$title = $article['title'];
			$description = $article['description'];

		}else{
			header('Location: news.php?msg=Erreur : Cette article n\'existe pas');
		}

	}else{
		header('Location: news.php?msg=Erreur : Erreur inconnue');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
    include('header.php');
    ?>
	<h1><?= $title ?></h1>
	<p><?= $description ?></p>
</body>
</html>