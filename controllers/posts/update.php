<?php

use Core\App;
use Core\SqliteDb;
use Core\Validator;

$db = App::resolve(SqliteDb::class);

$id = $_POST['id'];
$currentUser_id = 1;

// Get post from db
$query = "select * FROM posts WHERE post_id = :id";

$post = $db->query($query, [$id])->findorFail();

authorize($post['user_id'] == $currentUser_id);

$errors = [];

if (! Validator::string($post['post_title'], 1, 1000)) {
    $errors['title'] = "Title is required a must be less than 1000 characters";
}

if (! Validator::string($post['post_description'], 1, 1000)) {
    $errors['description'] = "Title is required a must be less than 1000 characters";
}

if (! Validator::string($post['post_body'], 1, 1000)) {
    $errors['body'] = "Title is required a must be less than 1000 characters";
}

// validation isssue
if (! empty($errors)) {
    return view("posts/edit.view.php", [
        'heading' => "Edit post entry",
        'errors' => $errors,
        'post' => $post
    ]);
}

$db->query("UPDATE posts SET post_title = :title, post_body = :body, post_description = :description, update_date = CURRENT_TIMESTAMP WHERE post_id = :id", [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'description' => $_POST['description'],
    'id' => $_POST['id']
]);

header("Location: /posts");
die();