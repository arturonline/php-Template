<?php

$heading = "Blog";


$config = require('config.php');
$db = new SqliteDb($config['sqlite']);

$posts = $db->query("select * FROM posts")->get();


require "views/posts/index.view.php";