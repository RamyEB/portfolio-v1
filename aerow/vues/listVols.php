<?php
/**
 * allTables.php
 * Cette page affiche tout le contenus de la BD
 * Auteur : El behedy Ramy
 */
require_once '../verificationConnexion.php';
require_once '../connexionDatabase/fonctions_postgresql.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../style/listVols.css" rel="stylesheet">
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

        <div class="container_table_listvol">
<table class="fixed_header0">
  <thead>
    <tr>
    <th>ID Vol</th>
        <th>Passagers</th>
        <th>Départ</th>
        <th>Heure départ</th>
        <th>Arrivée</th>
        <th>Heure arrivée</th>
        <th>ID Avion</th>
        <th>Marque</th>
        <th>Compagnie</th>
        <th>Détails</th>
    </tr>
  </thead>
  <tbody>
<?php
$res = listVols();
foreach ($res as $cle => $val) {
    echo "<tr class='tablebody'>";
    foreach ($val as $cle2 => $val2) {
      if($cle2 == 'nb_passenger'){
        echo "<td>". nbPassenger($val['id_flight'])['count'] ."</td>";
      }else{
        echo "<td>" . $val2 . "</td>";
      }
    }
    echo "<td><a href='../vues/infoVol.php?id=" . $val['id_flight'] ."'><img src='../images/plus.png'></a></td>";
    echo " </tr>";
}
?>
  </tbody>
</table>
</div>
        <div>
      </div>
      </div>
    </div>
</div>

</body>
</html>