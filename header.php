<header>
	<nav>
		<strong><a href="index.php">LoyaltyCard</a></strong>
		<ul>
			<a href="news.php">Actus</a>
			<?php
			if (isset($_SESSION['username'])) {
				echo "Bienvenue, " . $_SESSION['username'] . "<a href='profil.php'>Profil</a><a href='signout.php'>Déconnexion</a>";
				if ( isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
					echo "<a href='userList.php'>Administration</a>";
					echo "<a href='graph.php'>Tracking</a>";
					echo "<a href='redaction.php'>Article</a>";
				}
			}
			else echo "<a href='signin.php'>Connexion</a> <a href='signup.php'>Inscription</a>";
			?>
			
		</ul>
	</nav>
</header>
