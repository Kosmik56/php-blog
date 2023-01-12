<?php
function signupPage()
{
    require('templates\signupPage.php');
}

function handleSignup()
{
    // Sanitize email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    //password_encrypt() to encrypt emails

    //TODO: add check to verify unicity of identifications in here... Somewhere


    $database = dbConnect();
    $unique = $database->prepare('select count(id) from users where email = :email');

    $unique->execute([':email' => $email ]);

    if ($unique->fetchColumn() == 0) {
        //ID is unique
        $statement = $database->prepare('insert into users (email, name, password) values (:email, :nickname, :password)');
        $statement->execute([
            'email' => $_POST['email'],
            'nickname' => $_POST['nickname'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),

        ]);
        
    } else {
        // ID is already in use
        echo 'Sorry, email is already used';
    }
}
