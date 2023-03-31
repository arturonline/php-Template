<?php

use Core\App;
use Core\SqliteDb;
use Core\Validator;

$db = App::resolve(SqliteDb::class);

// Get form data

$email = $_POST['email'];
$password = $_POST['password'];

// Validate form data

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Email is not valid';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Password is not valid';
}

// If something is wrong, return to the form with the errors

if (!empty($errors)) {
    return view('sessions/create', [
        'errors' => $errors
    ]);
}

// check the user in the database

$user = $db->query('SELECT * FROM users WHERE user_email = :email', [
    'email' => $email
])->find();

if($user) {
    if (password_verify($password, $user['user_hash'])) {
        login([
            'email' => $email
        ]);

        header('Location: /');
        exit();
    }
}

// If something is wrong, return to the form with the errors
return view('sessions/create.view.php', [
    'errors' => [
        'password' => 'User or Password is not correct'
    ]
]);
