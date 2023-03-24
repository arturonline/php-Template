<?php

$heading = "Post";

$config = require('config.php');
$db = new SqliteDb($config['sqlite']);

$id = $_GET['id'];
$currentUser_id = 1;

$query = "select * FROM posts WHERE post_id = :id and user_id = :user_id";

$post = $db->query($query, [$id, $currentUser_id])->findorFail();

authorize($post['user_id'] !== $currentUser_id);


require "views/posts/show.view.php";