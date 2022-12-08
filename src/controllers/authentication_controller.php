<?php

require_once('src/model.php');

function loginPage()
{
	require('templates/authentication/loginPage.php');
}

function handleLogin()
{
	$database = dbConnect();
	$statement = $database->prepare('select * from users where email=:email and password=:password');

	$statement->execute([
		'email' => $_POST['email'],
		'password' => $_POST['password'],

	]);

	$user = $statement->fetch();

	if ($user == null) {
		throw new Exception('login inccorect');
	}

	//if $_SESSION is not empty with id or role or what ever, consider the user as logged in
	$_SESSION['user'] = $user;
	header('location: index.php');
	//the most robust and secure way to secure an app: keep it simple
}
