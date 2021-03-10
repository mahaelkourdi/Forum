<?php
require_once 'mysql/mysqlCours.php';
require_once 'helper.php';


$res = getCours();
sendMessage($res);


?>