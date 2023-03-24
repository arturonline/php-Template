<?php


require 'Validator.php';

$config = require('config.php');
$db = new SqliteDb($config['sqlite']);

$heading = "Create new post entry";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validation
    $errors = [];

    if (! Validator::string($_POST['title'], 1, 1000)) {
        $errors['title'] = "Title is required a must be less than 1000 characters";
    }

    if (! Validator::string($_POST['description'], 1, 1000)) {
        $errors['description'] = "Title is required a must be less than 1000 characters";
    }

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "Title is required a must be less than 1000 characters";
    }

    if(empty($errors)) {

        $db->query("INSERT INTO posts (post_title, post_body, post_description, creation_date, update_date, user_id) 
                                VALUES (:title, :body, :description, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1)", [
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'description' => $_POST['description']
        ]);
    }
}
require 'views/posts/create.view.php';
