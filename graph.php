<?php
session_start();
require("config.php");
$q = 'SELECT date, amount from tracking ORDER BY date DESC';
$req = $bdd->prepare($q);
$req->execute();
$re = $req->fetchAll();

$max = max($re[0][1],$re[1][1],$re[2][1],$re[3][1],$re[4][1],$re[5][1],$re[6][1],$re[7][1]);

?>

<!DOCTYPE html>
<head>
    <html lang = "fr">
    <link rel="stylesheet" href="style.css">
    <script type = "text/javascript" src="graph.js"></script>
</head>
<body>
    <?php include 'header.php';?>
    <canvas id="Canvas" width="900" height="400"></canvas>
    <script>drawGraph(<?php echo $max.",'".$re[0][0]."','".$re[1][0]."','".$re[2][0]."','".$re[3][0]."','".$re[4][0]."','".$re[5][0]."','".$re[6][0]."','".$re[7][0]."',".$re[0][1].",".$re[1][1].",".$re[2][1].",".$re[3][1].",".$re[4][1].",".$re[5][1].",".$re[6][1].",".$re[7][1]?>)</script>
</body>
</html>

