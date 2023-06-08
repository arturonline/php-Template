<?php

use Core\App;
use Core\SqliteDb;

// Get database instance
$db = App::resolve(SqliteDb::class);

// Get parameters
$id = $_GET['id'];
$currentUser_id = 1;

// Get post from db
$query = "select * FROM posts WHERE post_id = :id and user_id = :user_id";
$post = $db->query($query, [$id, $currentUser_id])->findorFail();

authorize($id !== $currentUser_id);

view("posts/show.view.php", [
    'heading' => "Show post entry",
    'post' => $post
]);
