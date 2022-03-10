<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
  include 'header.php';
	if (isset($_GET['msg'])) {
	 	echo "<h2>" . htmlspecialchars($_GET['msg']) . "</h2>";
	 }
	?>
	<section> <h1>Inscription</h1>
		<form action="signup_process.php" method="post" autocomplete="off"><br>
			
			<h2>Informations personnelles</h2>

		<input type="text" name="username" placeholder="Choisissez un pseudo"><br>
		<input type="text" name="surname" placeholder="Nom"><br>
		<input type="text" name="firstname" placeholder="Prénom"><br>
		<input type="email" name="email" placeholder="votre mail"><br>
		<input type="password" name="password" placeholder="votre mot de passe"><br>
		<p>Etes-vous majeur ?</p>
		<select name="majority" style="color: black;">
			<option value="true" style="color: black;">Oui</option>
			<option value="false" style="color: black;">Non</option>
		</select><br>
		<input type="submit" name="submit" value="s'inscrire">
	</form>
	</section>

</body>
</html>
