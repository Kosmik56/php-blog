<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Exception;

class AuthenticationController
{
    private UserRepository $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository;
    }

    public function signupPage()
    {
        require('templates\signup_page.php');
    }

    public function handleSignup()
    {
        $this->userRepository->signup($_POST);
        self::handleLogin($_POST);
    }

    public function loginPage()
    {
        require('templates/authentication/login_page.php');
    }

    public function handleLogin(?array $data = null)
    {
        if (null === $data) {
            $data = $_POST;
        }
        
        $user = $this->userRepository->login($data);
        //if $_SESSION is not empty with id or role or what ever, consider the user as logged in
        $_SESSION['user'] = $user;
        header('location: index.php');
        //the most robust and secure way to secure an app: keep it simple
    }
}