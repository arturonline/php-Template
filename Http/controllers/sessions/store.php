<?php

use Core\App;
use Core\SqliteDb;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(SqliteDb::class);

// Get form data

$email = $_POST['email'];
$password = $_POST['password'];

// Validate form data

$form = new LoginForm();

if (! $form->validate($email, $password)) {

    return view('sessions/create', [
        'errors' => $form->errors()
    ]);
}

// check the user in the database

$user = $db->query('SELECT * FROM users WHERE user_email = :email', [
    'email' => $email
])->find();

if ($user) {
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
