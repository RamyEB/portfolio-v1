<?php
/**
 * allTables.php
 * Cette page affiche tout le contenus de la BD
 * Auteur : El behedy Ramy
 */
require_once '../verificationConnexion.php';
require_once '../connexionDatabase/fonctions_postgresql.inc.php';
if (isset($_POST['id_delete'])) {
  deleteBaggage($_POST['id_delete']);
}

if (isset($_POST['add_baggage']) && isset($_POST['weight']) && isset($_POST['type'])){
  addBaggage($_POST['add_baggage'],$_POST['weight'] ,$_POST['type'] );

}


if (isset($_GET['id'])) {
    $listBaggage = listBaggage($_GET['id']);
    $showPassenger = showPassenger($_GET['id']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../style/infoBaggage.css" rel="stylesheet">
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
      <?php 
      echo "<h2 class='owner'>Liste des bagages de ". $showPassenger['first_name'] ." " . $showPassenger['last_name']."</h2>";
      ?>
        <div class="infoFlight">
          <?php
          foreach($listBaggage as $val){
            if($val['type'] == 'Bagage à main'){
              $typeOfBaggage = "handbag";
            }else{
              $typeOfBaggage = "suitcase";
            }
            echo "<div class='card'>
            <img src='../images/".$typeOfBaggage.".png'>
            <div class='text_baggage'>
              <p>Poids : ". $val['weight']. "kg </p>
              <p>Type : ".$val['type']." </p>
            </div>
            <form method='post' action='infoBaggage.php?id=".$_GET['id']."'>
              <button class='delete' name='id_delete' value='".$val['id_baggage']."'>Supprimer</button>
            </form>
          </div>";
          }
          ?>


          

          <div class="card card_add">
          <?php
            echo "<form method='post'  method='post' action='infoBaggage.php?id=".$_GET['id']."'>";
            ?>
            <p>Poids :</p>
            <select name="weight" class="choice">
              <option value="10">10</option>
              <option value="23">23</option>
            </select>
            <p>Type de bagage :</p>
            <select name="type" class="choice">
              <option value="Bagage à main">Bagage à main</option>
              <option value="Soute">Soute</option>
            </select>

              
              <?php
              echo "<button class='add' name='add_baggage' value=" . $_GET['id']. ">Ajouter un bagage</button>";
              ?>
            </form>
          </div>



        </div>
      </div>
    </div>
</div>

</body>
</html>