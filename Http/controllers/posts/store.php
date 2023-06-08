<?php

use Core\App;
use Core\Validator;
use Core\SqliteDb;

// Get database instance
$db = App::resolve(SqliteDb::class);

$errors = [];

if (!Validator::string($_POST['title'], 1, 1000)) {
    $errors['title'] = "Title is required a must be less than 1000 characters";
}

if (!Validator::string($_POST['description'], 1, 1000)) {
    $errors['description'] = "Title is required a must be less than 1000 characters";
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "Title is required a must be less than 1000 characters";
}

// validation isssue
if (! empty($errors)) {
    return view("posts/create.view.php", [
        'heading' => "Create new post entry",
        'errors' => $errors
    ]);
}


$db->query("INSERT INTO posts (post_title, post_body, post_description, creation_date, update_date, user_id) 
                                VALUES (:title, :body, :description, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1)", [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'description' => $_POST['description']
]);

header("Location: /posts");
die();


// validation issue

