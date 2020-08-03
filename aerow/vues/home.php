<?php
/**
 * home.php
 * Cette page est la page principale du site.
 * Auteur : El behedy Ramy
 */

require_once '../verificationConnexion.php';
require_once '../connexionDatabase/fonctions_postgresql.inc.php';
if (isset($_POST['id_plane'])){
    //MakePlaneSafe($_POST['id_plane']);
    unset($_POST['id_plane']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../style/home.css" rel="stylesheet">




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
    <div class='header'> 
        <?php echo "<p>Utilisateur : " . $_SESSION['login'] . "</p>";?>

</div> 

        <div class="info">
        

<?php
    $res = listPlaneDanger();
    if(!(empty($res))){
        echo "
<div class='container_table_urg'>
<h6>Vous ne pouvez pas traiter les avions en urgence</h6>
<table class='fixed_header_urgence'>
  <thead>
    <tr>
    <th>Numéro identification de l'avion</th>
        <th>Modèle</th>
        <th>Marque</th>
        <th>Ville/Aéroport</th>
        <th>Terminal </th>
        <th>Traitement</th>
    </tr>
  </thead>
  <tbody>";
    foreach($res as $cle => $val){
        echo "<tr class='tablebody'>
        <form method='post' action='home.php'>";
        foreach($val as $val2){
            echo "<td> $val2 </td>";
        }
    echo "<td><button name='id_plane' value='".$val['id_plane']."'>OK</button></td></form>";
    echo " </tr>";
    }
    echo"</tbody>
    </table>
    </div>";
}
?>


<div class="container_table">

<table class="fixed_header0">
  <thead>
    <tr>
    <th>Numéro identification de l'avion</th>
        <th>Modèle</th>
        <th>Marque</th>
        <th>Ville/Aéroport</th>
        <th>Terminal </th>
        <th>Etat </th>
    </tr>
  </thead>
  <tbody>
<?php
    $res = listPlane();
    foreach($res as $cle => $val){
        echo "<tr class='tablebody'>";
        foreach($val as $val2){
            if ($val2 === true){
                echo "<td>En vol</td>";
            }
            else if($val2 === false){
                echo "<td>Au sol</td>";
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



        <div>
      </div>
      </div>
    </div>
</div>


</body>
</html>