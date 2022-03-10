<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	$head = "MIME-Version: 1.0\r\n";
	$head .= 'From: "dusklight.org"<noreply@dusklight.org>' ."\n";
	$head .= 'Content-Type:text/html; charset=utf-8"'."\n";
	$head .= 'Content-Transfer-Encoding: 8bit';

	$message='
	<html>
		<body>
			<div align="center">
				test mail PHP
				<br>
					<a href="http://51.178.18.2/confirmation.php?pseudo='.urlencode($pseudo).'">Confirmez votre mail</a>
			</div>
		</body>
	</html>';

	mail('lucapaltrinieri@outlook.fr', "test", $message, $head);
?>

<form method="POST" action="">
	<input type="submit" value="recevoir un mail" name="mail">

</form>
</body>
</html>