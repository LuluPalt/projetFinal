<?php
  session_start();
  require('connexion_check_admin.php');
  require('config.php');
  $q = "SELECT username, firstname, surname, email, role, majority, status, roomCredits, itemCredits, activityCredits FROM USERS";
  $req = $bdd->prepare($q);
  $req->execute();
  $users = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <script src="ajax.js" charset="utf-8"></script>
    <?php
    include('header.php');
    include('admin_header.php');
    ?>
<section>
  <table>
    <tr>
      <th>Pseudo</th>
      <th>Prénom</th>
      <th>Nom de Famille</th>
      <th>Email</th>
      <th>Rôle</th>
      <th>Majorité</th>
      <th>Statut</th>
      <th>Crédits de Salles</th>
      <th>Crédits de matériel</th>
      <th>Crédits d'Activités</th>
    </tr>
    <?php
    $row = 0;
    foreach ($users as $key => $value) {
      echo "<tr>";
      for ($column=0; $column < 4 ; $column++) {
        echo "<td>" . $users[$row][$column] . "</td>";
      }
      ?>
      <td>
      <form action="userListprocess.php" method="post">
        <select name="role" size="2">
          <?php
          $setbefore = $users[$row][4];
          $alternative = ($setbefore == 'admin')? 'user': 'admin';
          echo "<option value='". $setbefore . "' style='color: black' selected>" . $setbefore . "</option>";
          echo "<option value='". $alternative . "' style='color: black'>" . $alternative . "</option>";
          ?>
        </select><br>
        <input type="hidden" name="username" value="<?php $users[$row][0]; ?>">
      <input type="submit" value="Changer">
      </form>
      </td>

      <td>
        <form action="userListprocess.php" method="post">
          <select name="majority" size="2">
            <?php
            $setbefore = ($users[$row][5] == 1)? 'oui' : 'non';
            $alternative = ($users[$row][5] == 1)? 'non' : 'oui';
            echo "<option value='". $users[$row][5] . "' style='color: black' selected>" . $setbefore . "</option>";
            echo "<option value='". !($users[$row][5]) . "' style='color: black'>" . $alternative . "</option>";
            ?>
          </select><br>
          <input type="hidden" name="username" value="<?php $users[$row][0]; ?>">
        <input type="submit" value="Changer">
        </form>
        </td>

        <td>
        <form action="userListprocess.php" method="post">
          <select name="status" size="2">
            <?php
            $setbefore = ($users[$row][6] == 1)? 'actif' : 'inactif';
            $alternative = ($users[$row][6] == 1)? 'inactif' : 'actif';
            echo "<option value='". $users[$row][6] . "' style='color: black' selected>" . $setbefore . "</option>";
            echo "<option value='". !($users[$row][6]) . "' style='color: black'>" . $alternative . "</option>";
            ?>
          </select><br>
          <input type="hidden" name="username" value="<?php $users[$row][0]; ?>">
        <input type="submit" value="Changer">
        </form>
        </td>

        <?php
        //crédits
        for ($column=7; $column < 10 ; $column++) {
          echo "<td>" . $users[$row][$column] . "</td>";
        }
      echo "</tr>";
      $row++;
        }
        ?>
  </table>
</section>

  </body>
</html>
