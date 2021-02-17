<?php


// executer auth.php, envoie un msg selon

require_once 'auth.php';
require_once 'helper.php';

if(authenticate() == true){
    sendMessage('Connexion OK');
}
else{
    sendError('Connexion not ok');
}
?>
