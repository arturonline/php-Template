<?php
use Core\App;
use Core\SqliteDb;

$db = App::resolve(SqliteDb::class);

$id = $_GET['id'];
$currentUser_id = 1;

// Get post from db
$query = "select * FROM posts WHERE post_id = :id and user_id = :user_id";
$post = $db->query($query, [$id, $currentUser_id])->findorFail();

authorize($post['user_id'] !== $currentUser_id);

view("posts/edit.view.php", [
    'heading' => "Edit post entry",
    'errors' => [],
    'post' => $post
]);
