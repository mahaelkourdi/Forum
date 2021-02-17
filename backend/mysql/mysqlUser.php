<?php

require_once 'mysqlConnect.php';


ini_set('display_errors', 'On');
error_reporting(E_ALL);

function getUser(){
    global $PDO;
    $query = "SELECT * FROM USER WHERE username= ?";
    $statement = $PDO->prepare($query);
    $statement->execute([$_POST['username']]);
    $user = $statement->fetch();
    return $user;
}

?>
