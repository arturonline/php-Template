<?php

namespace Core;

class Authenticator
{
    function attempt($email, $password)
    {

        // check the user in the database
        $user = App::resolve(SqliteDb::class)->query('SELECT * FROM users WHERE user_email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['user_hash'])) {
                $this->login([
                    'email' => $email
                ]);
                return true;
            }
        }
        return false;
    }

    public function login($user): void
    {
        // mark user has logged in.
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        // regenerate session id
        session_regenerate_id(true);
    }

    public function logout(): void
    {
        // destroy session
        Session::destroy();

    }
}