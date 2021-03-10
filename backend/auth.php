<?php

session_start();
require_once 'mysql/mysqlUser.php';

    // Pour s'authentifier
function authenticate(){
    if ( ! empty( $_POST ) ) {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            // Pour récupérer les données
            $user = getUser();
            // Vérifier password et username
            if ($_POST['password'] == $user['password']) {
                $_SESSION['user_id'] = $user['idUser'];
                return true;
            }
        }
    }
    return false ;
}

    function isAuthenticated(){

        if ( isset( $_SESSION['user_id'] ) ) {

            return true;

        }
        else {
            return false;
        }

    }

    ?>

