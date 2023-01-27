<?php

namespace App\Repository;

use Exception;

class UserRepository extends AbstractRepository
{
    public function signup($data) {
         // Sanitize email
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $unique = $this->connection->getConnection()->prepare('select count(id) from users where email = :email');

        $unique->execute([':email' => $email]);

        if ($unique->fetchColumn() == 0) {
            //ID is unique
            $statement = $this->connection->getConnection()->prepare('insert into users (email, name, password) values (:email, :nickname, :password)');
            $statement->execute([
                'email' => $data['email'],
                'nickname' => $data['nickname'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ]);
        } else {
            // ID is already in use
            throw new Exception('Sorry, email is already used');
        }
    }

    public function login($data) {
        $statement = $this->connection->getConnection()->prepare('select * from users where email=:email');

        $statement->execute([
            'email' => $data['email'],
        ]);

        $user = $statement->fetch();
        if (!password_verify($data['password'], $user['password'])) {
            throw new Exception('login inccorect');
        }

        return $user;
    }
}