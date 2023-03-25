<?php

use Core\App;
use Core\SqliteDb;

$db = App::resolve(SqliteDb::class);

$id = $_POST['id'];
$currentUser_id = 1;


// 1. Check user authorization
$query = "select * FROM posts WHERE post_id = :id and user_id = :user_id";
$post = $db->query($query, [$id, $currentUser_id])->findorFail();
authorize($post['user_id'] !== $currentUser_id);

// 2. delete the post
$query = "DELETE FROM posts WHERE post_id = :id and user_id = :user_id";
$db->query($query, [$id, $currentUser_id]);

// 3. redirect to posts index
header("Location: /posts");
exit();