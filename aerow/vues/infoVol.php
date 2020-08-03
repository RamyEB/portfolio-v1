<?php
/**
 * allTables.php
 * Cette page affiche tout le contenus de la BD
 * Auteur : El behedy Ramy
 */
require_once '../verificationConnexion.php';
require_once '../connexionDatabase/fonctions_postgresql.inc.php';

if (isset($_GET['id'])){
  $infoVol=infoflight($_GET['id']);
  $passengers=listPassenger($_GET['id']);
  $nbPassenger=nbPassenger($_GET['id']);
  $MAXPassenger=MAXPassenger($_GET['id']);
  $MINPassenger=MINPassenger($_GET['id']);
  $AVGPassenger=AVGPassenger($_GET['id']);
  $nbPassengerMineur=nbPassengerMineur($_GET['id']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../style/infoVol.css" rel="stylesheet">
	<title>Aerow</title>
</head>
<body>
  

<div class="wrapper">

    <div class="sidebar">
        <h2>Aerow<span>.</span></h2>
        <ul>

        <a href="../vues/home.php"><img src="../images/home.png"><li>Home</li></a>
        <a href="listVols.php"><img src="../images/plane.png"><li>Liste des vols</li></a>
        <a href='allTables.php'><img src="../images/database.png"><li>Liste des données</li></a>
        <a href='../deconnexion.php'><img src="../images/power.png"><li>Déconnexion</li></a>

        </ul>
    </div>
    <div class="main_content">
        <?php echo "<div class='header'> Utilisateur : " . $_SESSION['login'] . "</div>"; ?>
        <div class="info">
        <div class="infoFlight"> 
        <div class="infoFlight-top">
<table>
  <tbody>
  <tr>
  <h5>Information sur le vol</h5>
          <?php
          echo "<tr>";
          echo "<td> Numéro de vol : </td><td>" . $infoVol['id_flight'] . "</td>";
          echo "</tr><tr>";
          echo "<td> Compagnie du vol : </td><td>" . $infoVol['name_company'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Durée du vol : </td><td>" . $infoVol['duration_flight'] . "h </td>"; 
          echo "</tr><tr>";
          echo "<td> Classe éco : </td><td>" . $infoVol['nb_eco'] . " sièges</td>"; 
          echo "</tr><tr>";
          echo "<td> Classe business : </td><td>" . $infoVol['nb_business'] . " sièges</td>";
          echo "</tr><tr>";
          echo "<td> Première classe  : </td><td>" . $infoVol['nb_preminum'] . " sièges</td>"; 
          echo "</tr><tr>";
          echo "<td> Nombre de passagers  : </td><td>" . $nbPassenger['count'] ." / " . $infoVol['nb_place'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Places restantes  : </td><td>" . ($infoVol['nb_place'] - $nbPassenger['count']) . " places </td>"; 
          echo "</tr><tr>";
          echo "<td> Nombre de mineurs : </td><td>" . $nbPassengerMineur['count'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td>Age maximum : </td><td>" . $MAXPassenger['max'] . " ans</td>"; 
          echo "</tr><tr>";
          echo "<td> Age minimum  : </td><td>" . $MINPassenger['min']. " ans</td>"; 
          echo "</tr><tr>";
          echo "<td> Moyenne d'age : </td><td>" . round($AVGPassenger['avg'],2) . " ans</td>"; 
          echo "</tr><tr>";
          ?>
          </tr>
          </tbody>
        </table>
        <h5>Information sur l'avion</h5>
        <table>
        <tbody>
  <?php
          echo "<tr>";
          echo "<td> Numéro de l'avion : </td><td>" . $infoVol['id_plane'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Marque de l'avion : </td><td>" . $infoVol['brand_plane'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Modèle de l'avion : </td><td>" . $infoVol['model_plane'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Nombre de place : </td><td>" . $infoVol['nb_place'] . "</td>"; 
          echo "</tr><tr>
          </tr>";
          ?>
  </tbody>
</table>
<h5>Départ</h5>
        <table>
        <tbody>
  <?php
          echo "<tr>";
          echo "<td> Ville : </td><td>" . $infoVol['airport_departurs'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Heure : </td><td>" . $infoVol['h_departurs'] . "h</td>"; 
          echo "</tr><tr>";
          echo "<td> Terminal : </td><td>" . $infoVol['terminal_departurs'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Porte : </td><td>" . $infoVol['gate_departurs'] . "</td>"; 
          echo "</tr><tr>
          </tr>";
          ?>
  </tbody>
</table>
<h5>Arrivée</h5>
        <table>
        <tbody>
  <?php
          echo "<tr>";
          echo "<td> Ville : </td><td>" . $infoVol['airport_arrival'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Heure : </td><td>" . $infoVol['h_arrival'] . "h</td>"; 
          echo "</tr><tr>";
          echo "<td> Terminal : </td><td>" . $infoVol['terminal_arrival'] . "</td>"; 
          echo "</tr><tr>";
          echo "<td> Porte : </td><td>" . $infoVol['gate_arrival'] . "</td>"; 
          echo "</tr><tr>
          </tr>";
          ?>
  </tbody>
</table>

  </div>
  <table class="table-passager">
  <thead>
    <tr>
        <th>Nom de famille</th>
        <th>Prénom</th>
        <th>Age</th>
        <th>Classe de siège</th>
        <th>Numéro de siège</th>
        <th>Bagage</th>

    </tr>
  </thead>
  <tbody>
  <?php
foreach ($passengers as $cle => $val) {
    echo "<tr class='tablebody'>";
    foreach ($val as $cle2 => $val2) {
      if ($val2 == 'staff'){
        echo "<td><img src='../images/staff.png'></td>";
      }elseif($cle2 == 'nb_baggage'){
        echo "<td><a href='../vues/infoBaggage.php?id=" . $val['id_passenger'] ."'><img src='../images/baggage.png'></a></td>";
      }elseif($cle2 == 'id_passenger'){

      }
      else{
        echo "<td>" . $val2 . "</td>";
      }

    }
    echo " </tr>";
}
?>
  </tbody>
</table>
            </div>
        </div>
      </div>
    </div>

</body>
</html>