<?php

use Core\App;
use Core\Authenticator;
use Core\SqliteDb;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)){
    $errors['email'] = 'Email is not valid';
}

if(! Validator::string($password, 7, 255)){
    $errors['password'] = 'Password is not valid';
}

if (! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// Check if user exists

$db = App::resolve(SqliteDb::class);

$user = $db->query('SELECT * FROM users WHERE user_email = :email', [
    'email' => $email
])->find();

if ($user) {
    redirect("/");
} else {

    $db->query('INSERT INTO users (user_name, user_email, user_hash) VALUES (:uname, :email, :password)', [
        'uname' => "hola",
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    (new Authenticator)->login([
        'email' => $email
    ]);

    redirect("/");

}



