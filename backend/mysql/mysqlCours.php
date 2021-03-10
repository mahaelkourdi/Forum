<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

function getCours(){
    global $PDO;
    $query = "SELECT * FROM Cours WHERE idCours in (SELECT idCours FROM INSCRIPTION WHERE idUser = ?) ";
    $statement = $PDO->prepare($query);
    $exec = $statement->execute([$_SESSION['user_id']]);
    $resultats = $statement->fetchAll(PDO::FETCH_ASSOC );
    return $resultats;
}

?>