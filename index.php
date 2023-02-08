<?php
session_start();

use App\Controller\AuthenticationController;
use App\Controller\CommentController;
use App\Controller\PostController;
use App\Controller\AppController;

require_once __DIR__ . '/vendor/autoload.php';

$post = new PostController;
$authentication = new AuthenticationController;
$comment = new CommentController;
$app = new AppController;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $post->show($identifier);
            } else { 
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $comment->create($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'signup') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $authentication->signupPage();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $authentication->handleSignup();
            }
        } elseif ($_GET['action'] === 'login') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $authentication->loginPage();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $authentication->handleLogin();
            }
        } elseif ($_GET['action'] === 'logout') {
            session_unset();
            session_destroy();
            $app->callBlog();
        } 
        elseif($_GET['action'] == 'add_content') {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $post->form();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post->create();
            }
        }
        elseif($_GET['action'] == 'homepage'){
            $app->callHomepage();
        }
        elseif($_GET['action'] == 'blog'){
            $app->callBlog();
        }
        else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        $show_all = isset($_GET['show_all']) && 1 == $_GET['show_all'] ? true : false; 
        $app->callBlog($show_all);
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('templates/error.php');
}