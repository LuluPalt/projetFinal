<?php
session_start();
if (!isset($_SESSION['username'])){
  header('Location: signin.php?msg=Vous devez vous connecter pour accéder à cette page !');
  exit;
}
?>
