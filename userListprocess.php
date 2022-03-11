<?php
	require('config.php');

  if(isset($_POST['role'])) {

    $req = $bdd->prepare('UPDATE USERS SET role = ? WHERE username = ?');
    $req->execute([$_POST['role'], $_POST['username']]);
  }
  if(isset($_POST['majority'])) {

    $req = $bdd->prepare('UPDATE USERS SET majority = ? WHERE username = ?');
    $req->execute([$_POST['majority'], $_POST['username']]);
  }

  if(isset($_POST['status'])) {

    $req = $bdd->prepare('UPDATE USERS SET status = ? WHERE username = ?');
    $req->execute([$_POST['status'], $_POST['username']]);
  }
  header('Location: userList.php');
  exit;
?>
