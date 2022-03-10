<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
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
	<section>
	<h1>Connection</h1>
	<form action="signin_process.php" method="post" autocomplete="off"><br>
		<input type="text" name="username" placeholder="votre pseudo"><br>
		<input type="password" name="password" placeholder="votre mot de passe"><br>
		<input type="submit" name="submit" value="se connecter">
	</form>
	</section>
</body>
</html>
