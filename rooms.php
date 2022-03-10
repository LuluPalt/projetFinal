<?php
session_start();
require('connexion_check_user.php');
require('config.php');
$q = "SELECT id,name,address,capacity FROM ROOMS";
$req = $bdd->prepare($q);
$req->execute();
$rooms = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Salles</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <script src="ajax.js" charset="utf-8"></script>
    <?php
    include('header.php');
     ?>
     <section>
       <h1>Réserver une salle</h1>
       <h3>Choisissez votre salle :</h3>
       <form action="rooms_process.php" method="post">
         <?php
         foreach ($rooms as $room) {
           echo "<input type='radio' name='room' class='room' value='".$room['id']."'>";
           echo "<label for='room'>".$room['name']. " - " . $room['address']. " - Capacité: ". $room['capacity']."</label>";
           echo "<br>";
         }
        ?>
       <h3>Choisissez votre jour :</h3>
         <?php
         $startdate = date('Y/m/d');
         echo "<input type='date' id='date' name='date' min=".$startdate." max=".strtotime('+1 week', $startdate).">";
          ?><br>
          <br>
          <button type="button" name="button" onclick="displayAvailibility()">Choisir cette date</button>
       </form>
     </section>
     <section id="results">

     </section>
  </body>
</html>
