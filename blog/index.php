<?php
session_start();
//require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepage.php');
//require_once('src/controllers/post.php');
require_once('src/controllers/authentication_controller.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                //post($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

               // addComment($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'login') {
            
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                loginPage();
            }
            elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
                handleLogin();
            }
        } elseif ($_GET['action'] === 'logout') {
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        callHomepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
//TODO: refactor code into a switch:case