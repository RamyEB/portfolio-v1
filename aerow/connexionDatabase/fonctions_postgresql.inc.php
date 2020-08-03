<?php

/**
 * fonctions_postgresql.inc.php
 * Cette page regroupe l'enssemble des fonction necessaire au fonctionnement du tp
 * Auteur : El behedy Ramy
 */

 
//Connexion à la base de donnée unique via Model
require_once 'Model.php';
$database = Model::getModel(); //On récupère le modèle pour donnée une instance unique

/**
 * selectTable()
 * Description : Retourne une variable qui contient un tableau HTML avec les valeurs de la table demandée
 * Arg entrée : $reqSQL requete SQL SELECT
 * Arg sortie : $result : chaine de caractere
 */
function selectTable($reqSQL)
{
    global $database;
    try {
        $requete = $database->prepare($reqSQL); //En cas d’erreur, une exception est levée grace au prepare
        //$requete->bindValue(':name', 'dgfh');
        $requete->execute(); //execute la requette et en cas d’erreur, une exception est levée
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

        $result = '';
        if (!(empty($donnees))) {
            $keys = array_keys($donnees[0]);
            $result = "<table><thead><tr>";
            foreach ($keys as $cle) {
                $result .= "<th> $cle </th>";
            }
            $result .= "</tr></thead><tbody>";
            foreach ($donnees as $tab) {
                $result .= "<tr>";
                foreach ($tab as $val) {
                    if ($val === true){
                        $result .= "<td>true</td>";
                    }
                    else if($val === false){
                        $result .= "<td>false</td>";
                    }
                    else{
                        $result .= "<td>" . $val . "</td>";
                    }
                }
                $result .= "</tr>";
            }

            $result .= "</tbody></table>";
            return $result;
        } else {

            return "Table vide";
        }
    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * allTables()
 * Description : Affiche le contenu de la base de donnée
 */
function allTables()
{
    global $database;
    try {
        // POSTGRES : $requete = $database->prepare("SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema'"); //En cas d’erreur, une exception est levée grace au prepare
        $requete = $database->prepare("SELECT table_name FROM information_schema.tables
        WHERE table_schema = 'ramy';"); //En cas d’erreur, une exception est levée grace au prepare
        $requete->execute(); //execute la requette et en cas d’erreur, une exception est levée
        while ($donnees = $requete->fetch(PDO::FETCH_NUM)) {
            echo "<h1>$donnees[0]</h1>";
            echo selectTable("SELECT * FROM $donnees[0]");
        }
    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * connexion()
 * Description : Vérifie si le login et le mot de passe de la conexion existent dans la BD
 * Arg entrée : $login : login de l'utilisateur
 * Arg entrée : $pass : mot de pass de l'utilisateur
 * Arg sortie : boolean
 */
function connexion($login, $pass)
{
    global $database;
    try {
        $req = $database->prepare('SELECT login, password FROM admin WHERE login=:login');
        $req->bindValue(':login', $login);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        //S'il y a une correspondance
        if ($res) {
            if ((password_verify($pass, $res['password']) || $pass == $res['password']) and $login == $res['login']) { //Si les mots de passe sont les mêmes
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * inscription()
 * Description : Enregistre un utilisateur dans la base de donnés
 * Arg entrée : $login : login de l'utilisateur
 * Arg entrée : $pass : mot de pass de l'utilisateur
 * Arg sortie : chaine de caractère
 */
function inscription($login, $pass)
{
    global $database;
    try {
        //Vérification de la disponibilité du login
        $req = $database->prepare('SELECT login FROM admin WHERE login=:login');
        $req->bindValue(':login', $login);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        if ($res) {
            return "déjà utilisé";
        }
        //Inscription
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $req = $database->prepare('INSERT INTO admin(login,password) VALUES(:login, :password)');
        $req->bindValue(':login', $login);
        $req->bindValue(':password', $pass);
        $req->execute();

        //Vérification de la connexion
        $req = $database->prepare('SELECT login, password FROM admin WHERE login=:login and password=:password');
        $req->bindValue(':login', $login);
        $req->bindValue(':password', $pass);
        $req->execute();

        $res = $req->fetch(PDO::FETCH_ASSOC);
        //S'il y a une correspondance
        if ($res) {
            return "succès";
        } else {
            return "Erreur dans l'inscription";
        }
    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * listVols()
 * Description : Affiche la liste des vols sous forme de tableau
 */
function listVols()
{
    global $database;
    try {
        $req = $database->prepare('SELECT id_flight, nb_passenger, airport_departurs, h_departurs, airport_arrival, h_arrival, id_plane, brand_plane, name_company  FROM flight NATURAL JOIN plane NATURAL JOIN plane_info NATURAL JOIN company');
        $req->execute();
        $res = $req->fetchALL(PDO::FETCH_ASSOC);
       
        return $res;
    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}


/**
 * listPlane()
 * Description : Affiche la liste des avions
 */
function listPlane()
{
    global $database;
    try {
        $req = $database->prepare('SELECT id_plane,model_plane, brand_plane,city,terminal_position, train FROM plane NATURAL JOIN airport NATURAL JOIN plane_info NATURAL JOIN company');
        $req->execute();
        $res = $req->fetchALL(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * listPlaneDanger()
 * Description : Affiche la liste des avions en état d'urgence
 */
function listPlaneDanger()
{
    global $database;
    try {
        $req = $database->prepare("SELECT id_plane,model_plane, brand_plane,city,terminal_position FROM plane NATURAL JOIN airport NATURAL JOIN plane_info NATURAL JOIN company WHERE etaturgence='true'");
        $req->execute();
        $res = $req->fetchALL(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}


/**
 * MakePlaneSafe()
 * Description : Modifie la variable etatdurgence d'un avion à false
 */
function MakePlaneSafe($id_plane)
{
    global $database;
    try {
        $req = $database->prepare("UPDATE plane SET etaturgence='false' WHERE id_plane=:id_plane");
        $req->bindValue(':id_plane', $id_plane);
        $req->execute();
        $res = $req->fetchALL(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * infoflight()
 * Description : Affiche toutes les informations qui concerne le vol
 */
function infoflight($id_flight)
{
    global $database;
    try {
        $req = $database->prepare("SELECT id_flight, id_plane, brand_plane, model_plane, nb_place, name_company, nb_passenger, airport_departurs, h_departurs, terminal_departurs, gate_departurs, h_arrival, airport_arrival, terminal_arrival, gate_arrival, duration_flight,nb_eco, nb_preminum , nb_business FROM flight natural join company natural join plane natural join plane_info where id_flight=:id_flight");
        $req->bindValue(':id_flight',$id_flight); 
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * listPassenger()
 * Description : Affiche tous les passagers d'un vol
 */
function listPassenger($id_flight) 
{
    global $database;
    try {
        $req = $database->prepare("SELECT id_passenger ,last_name, first_name, age, class_seat , num_seat ,nb_baggage FROM flight NATURAL JOIN passenger WHERE id_flight=:id_flight");
        $req->bindValue(':id_flight', $id_flight);
        $req->execute();
        $res = $req->fetchALL(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}


/**
 * showPassenger()
 * Description : Affiche un passager
 */
function showPassenger($id_passenger) 
{
    global $database;
    try {
        $req = $database->prepare("SELECT first_name, last_name FROM passenger WHERE id_passenger=:id_passenger");
        $req->bindValue(':id_passenger', $id_passenger);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}



/**
 * listBaggage()
 * Description : Retourne la liste des bagages
 */
function listBaggage($id_passenger) 
{
    global $database;
    try {
        $req = $database->prepare("SELECT * FROM baggage WHERE id_passenger=:id_passenger;");
        $req->bindValue(':id_passenger', $id_passenger);
        $req->execute();
        $res = $req->fetchALL(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * addBaggage()
 * Description : Ajoute un baggage
 */
function addBaggage($id_passenger,$weight,$type) 
{
    global $database;
    try {
        $req = $database->prepare("INSERT INTO baggage(id_passenger , weight , type) VALUES (:id_passenger, :weight, :type);");
        $req->bindValue(':id_passenger', $id_passenger);
        $req->bindValue(':weight', $weight);
        $req->bindValue(':type', $type);
        $req->execute();

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * deleteBaggage()
 * Description : supprime un baggage
 */
function deleteBaggage($id_baggage) 
{
    global $database;
    try {
        $req = $database->prepare("DELETE FROM baggage WHERE id_baggage=:id_baggage");
        $req->bindValue(':id_baggage', $id_baggage);
        $req->execute();

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * listModelPlane()
 * Description : Affiche la liste des différents models unique
 */
function listModelPlane() 
{
    global $database;
    try {
        $req = $database->prepare("SELECT model_plane FROM plane NATURAL JOIN plane_info GROUP BY plane_info.model_plane;");
        $req->execute();
        $res = $req->fetchALL(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * nbPassenger()
 * Description : Nombre de personne d'un vol donné
 */
function nbPassenger($id_flight) 
{
    global $database;
    try {
        $req = $database->prepare("SELECT COUNT(id_passenger) AS count FROM passenger WHERE id_flight=:id_flight");
        $req->bindValue(':id_flight', $id_flight);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * nbPassengerMineur()
 * Description : Nombre de personne mineure d'un vol donné
 */
function nbPassengerMineur($id_flight) 
{
    global $database;
    try {
        $req = $database->prepare("SELECT COUNT(*) AS count FROM passenger WHERE id_flight=:id_flight AND age<18;");
        $req->bindValue(':id_flight', $id_flight);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * AVGPassenger()
 * Description : Moyenne d'age des passagers d'un vol
 */
function AVGPassenger($id_flight) 
{
    global $database;
    try {
        $req = $database->prepare("SELECT AVG(age) AS avg FROM passenger WHERE id_flight=:id_flight;
        ");
        $req->bindValue(':id_flight', $id_flight);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}

/**
 * AVGPassenger()
 * Description : Passager le plus jeune
 * */
function MINPassenger($id_flight) 
{
    global $database;
    try {
        $req = $database->prepare("select MIN(age) AS min from passenger where id_flight=:id_flight");
        $req->bindValue(':id_flight', $id_flight);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}


/**
 * AVGPassenger()
 * Description : Passager le plus vieux
 * */
function MAXPassenger($id_flight) 
{
    global $database;
    try {
        $req = $database->prepare("select MAX(age) AS max from passenger where id_flight=:id_flight");
        $req->bindValue(':id_flight', $id_flight);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;

    } catch (PDOException $e) {
        die('<p> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
    }
}