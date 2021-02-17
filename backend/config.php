<?php

// Pour configurer la bdd : le port, l'url , le nom de la bdd,
// la manière dont on se connecte : identifiant : root et mot de passse : root


$host = 'localhost:8889';
$dbname = 'forum';
$login = 'root';
$password = 'root';


$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false);

?>