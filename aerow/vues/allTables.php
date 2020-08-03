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
        <?php echo "<div class='header'> Utilisateur : ".$_SESSION['login']."</div>";?>
        <div class="info">
        <?php
//appelle de la fonction allTables
allTables();
?>
        <div>
      </div>
      </div>
    </div>
</div>

</body>
</html>