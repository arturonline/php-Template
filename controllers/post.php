<?php

$heading = "Post";

$config = require('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];
$query = "select * FROM Blog.posts WHERE Id = :id";

$post = $db->query($query, [$id])->fetch();


require "views/post.view.php";