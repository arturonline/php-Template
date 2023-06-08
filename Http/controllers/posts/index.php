<?php

use Core\App;
use Core\SqliteDb;

// Get database instance
$db = App::resolve(SqliteDb::class);

$posts = $db->query("select * FROM posts")->get();


view("posts/index.view.php", [
    'heading' => "Entries list",
    'posts' => $posts
]);