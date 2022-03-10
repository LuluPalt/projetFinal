	<?php

	require('config.php');
	require('connexion_check_admin.php');
	$mode_edition = 0;

	if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
	   $mode_edition = 1;
	   $edit_id = htmlspecialchars($_GET['edit']);
	   $edit_article = $bdd->prepare('SELECT * FROM NEWS WHERE id = ?');
	   $edit_article->execute(array($edit_id));
	   if($edit_article->rowCount() == 1) {
	      $edit_article = $edit_article->fetch();
	   } else {
	      die('Erreur : l\'article n\'existe pas...');
	   }
	}
	if(isset($_POST['title'], $_POST['description'])) {
	   if(!empty($_POST['title']) AND !empty($_POST['description'])) {
	      
	      $article_titre = htmlspecialchars($_POST['title']);
	      $article_contenu = htmlspecialchars($_POST['description']);
	      if($mode_edition == 0) {
	         $req = $bdd->prepare('INSERT INTO NEWS (title, description, publishDate) VALUES (?, ?, NOW())');
	         $req->execute(array($article_titre, $article_contenu));
	         $message = 'Votre article a bien été posté';
	      } else {
	         $update = $bdd->prepare('UPDATE NEWS SET title = ?, description = ?, publishDateEdit = NOW() WHERE id = ?');
	         $update->execute(array($article_titre, $article_contenu, $edit_id));
	         header('Location: article.php?id='.$edit_id);
	         $message = 'Votre article a bien été mis à jour !';
	      }
	   } else {	
	      $message = 'Veuillez remplir tous les champs';
	   }
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
	   <title>Rédaction / Edition</title>
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
		include('header.php');
		?>
	   <form method="POST" id="redaction">
	      <input type="text" name="title" placeholder="Titre"<?php if($mode_edition == 1) { ?> value="<?= 
	      $edit_article['title'] ?>"<?php } ?> /><br />
	      <textarea name="description" placeholder="Contenu de l'article"><?php if($mode_edition == 1) { ?><?= 
	      $edit_article['description'] ?><?php } ?></textarea><br />
	      <input type="submit" value="Envoyer l'article" />
	   </form>
	   <br />
	   <?php if(isset($message)) { echo $message; } ?>
	</body>
	</html>