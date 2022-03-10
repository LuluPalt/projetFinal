<?php
	session_start();
	require('config.php');

	$q = "SELECT * FROM NEWS ORDER BY publishDate DESC";
	$article = $bdd->query($q);
?>
<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
    include('header.php');
    ?>
    <br>
	<ul>
	<?php
	while ($a = $article->fetch()) { ?>
		<li><a href="article.php?id=<?= $a['id'] ?>"><?= $a['title'] ?></a> | <a href="redaction.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="delete.php?id=<?= $a['id'] ?>">Supprimer</a></li>
	<?php  } ?>
	<ul>
</body>
</html>