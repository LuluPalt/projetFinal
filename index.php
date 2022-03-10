<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Page d'accueil de Dusklight</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php include 'header.php';?>
		<main>

				<form>
					<h3>Search what's in the news !</h3>
					<input type="text" name="search" id="search">
				<button type="button" onclick="searchAll()"><img src="search_logo.png" width="20" height="20" style="background: transparent;" id="search_logo"></button>
				</form>
				<div id="searchresults"></div>

			
				</div>
				<div class="cta">
					<a href="signup.php">Rejoignez-nous</a>
				</div>
			</section>
		</main>
		<script src="ajax.js" charset="utf-8"></script>
	</body>
</html>
