<?php
session_start();

use App\Controller\AuthenticationController;
use App\Controller\CommentController;
use App\Controller\PostController;
use App\Controller\AppController;

require __DIR__ . '/vendor/autoload.php';

$post = new PostController;
$authentication = new AuthenticationController;
$comment = new CommentController;
$app = new AppController;

$action = 'index';
$showAll = false;
$identifier = 0;
$method = 'GET';

if (isset($_GET['action']) && $_GET['action'] !== '') {
    $action = htmlspecialchars($_GET['action']);
}

if (isset($_GET['show_all']) && (int) $_GET['show_all'] === 1) {
    $showAll = true;
} 

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $identifier = (int) $_GET['id'];
}

if (isset($_SERVER['REQUEST_METHOD']) && in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST'])) {
    $method = $_SERVER['REQUEST_METHOD'];
} 

try {
        if ($action === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = (int) $_GET['id'];
                $post->show($identifier);
            }
        } elseif ($action === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                $comment->create($identifier, $_POST);
            } 
        } elseif ($action === 'signup') {
            if ($method === 'GET') {
                $authentication->signupPage();
            } elseif ($method === 'POST') {
                $authentication->handleSignup();
            }
            else {
                throw new Exception('requête invalide!');
            } 
        } elseif ($action === 'login') {
            if ($method === 'GET') {
                $authentication->loginPage();
            } elseif ($method === 'POST') {
                $authentication->handleLogin();
            } 
        } elseif ($action === 'logout') {
            session_unset();
            session_destroy();
            $app->callHomepage();
        } 
        elseif($action === 'add_content') {
            if ($method ==='GET') {
                $post->form();
            } elseif ($method === 'POST') {
                $post->create();
            }
        }
        elseif($action === 'index') {
            $app->callHomepage($showAll);
        }
        else {
            http_response_code(404);
            throw new Exception("La page que vous recherchez n'existe pas.");
        }

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('templates/error.php');
}