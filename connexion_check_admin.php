<?php
session_start();
if (!isset($_SESSION['username']) &&  $_SESSION['role'] == 'admin') {
  header('Location: signin.php?msg=Vous ne pouvez pas accéder à cette page !');
  exit;
}
?>
