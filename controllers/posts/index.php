<?php

$config = require base_path('config.php');
$db = new SqliteDb($config['sqlite']);

$posts = $db->query("select * FROM posts")->get();


view("posts/index.view.php", [
    'heading' => "Entries list",
    'posts' => $posts
]);