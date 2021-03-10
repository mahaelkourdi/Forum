<?php

require_once 'mysql/mysqlTopic.php';
require_once 'helper.php';

// utiliser $Session 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$userId = $_SESSION['user_id'];
$coursId = $_POST['cours_id'];
$titre = $_POST['titreTopic'];

$res = existTopic($coursId,$titre);
if ($res == 0){
 $resultat = addTopic($coursId,$userId,$titre);
  sendMessage($resultat);

}
else{
 sendError('Le sujet existe déjà');
}


?>

