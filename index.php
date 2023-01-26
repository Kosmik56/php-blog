<?php
session_start();
require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/authentication_controller.php');
require_once('src/controllers/signup_controller.php');
require_once('src/controllers/add_post.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                post($identifier);
            } else { 
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                addComment($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'signup') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                signupPage();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                handleSignup();
            }
        } elseif ($_GET['action'] === 'login') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                loginPage();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                handleLogin();
            }
        } elseif ($_GET['action'] === 'logout') {
            session_unset();
            session_destroy();
            callHomepage();
        } 
        elseif($_GET['action'] == 'add_content') {
            add_post_page();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                add_post_page();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                add_content();
            }
        }
        else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        $show_all = isset($_GET['show_all']) && 1 == $_GET['show_all'] ? true : false; 
        callHomepage($show_all);
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}