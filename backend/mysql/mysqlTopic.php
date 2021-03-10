<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
require_once 'mysql/mysqlConnect.php';

function getTopic(){
    global $PDO;
    $id = $_GET['id'];

    // definition de la requête
    $query = "SELECT * FROM TOPIC LEFT JOIN COURS ON  TOPIC.idCours = COURS.idCours WHERE TOPIC.idCours = ?";

    // envoi et execution de la requête à la base
    $statement = $PDO->prepare( $query );// préparation
    $exec = $statement->execute([$id]);// exécution

    // recuperation du resultat
    $resultats = $statement->fetchAll ( PDO::FETCH_ASSOC );

    return $resultats;
}



  function existTopic($coursId,$titre){
    global $PDO;
    $query = "SELECT * FROM TOPIC WHERE idCours = ? AND titreSujet = ? ";

    $statement = $PDO->prepare($query);
    $statement->execute(array($coursId, $titre));
    return $statement->rowCount();

    }
    function addTopic($coursId,$userId, $titre){
    global $PDO;
    $query ="INSERT INTO TOPIC (idTopic, idCours, idUser, titreSujet, nbPosts, lastPost) VALUES (NULL, $coursId, $userId,'$titre','0',CURRENT_TIME )";
    $statement = $PDO->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
?>