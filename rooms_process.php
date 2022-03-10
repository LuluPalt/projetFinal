<?php
require('connexion_check_user.php');
require('config.php');
if (isset($_GET['room']) && isset($_GET['date'])) {
  $q = "SELECT timeslot FROM RENTS WHERE date= STR_TO_DATE(?,'%Y,%m,%d') AND roomid= ? AND timeslot= ?";
  $req = $bdd->prepare($q);
//7 timeslots de deux heures de 10h à 1h
echo "<form>";
  for ($i=0; $i < 7; $i++) {
    $hour = 10+2*$i;
    $req->execute([$_GET['date'],$_GET['room'], $i]);
    $res = $req->fetchAll();
    echo "<b>". $hour . "h00</b><br>";
    if (count($res) == 0){
    	//timeslot libre
      echo "<i id='".$i."'>libre : Réserver ?</i>";
      echo "<button type='button' name='button' onclick='bookRoom(".$i.")'>Oui !</button>";
    }else{
      //timeslot occupé
      echo "déjà réservé ! =/</i>";
    }
    echo "<br>";
  }
  echo "<b>1h00</b>";
  echo "</form>";
}
 ?>
