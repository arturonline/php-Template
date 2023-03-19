<?php

$heading = "Post";

$config = require('config.php');
$db = new SqliteDb($config['sqlite']);

$id = $_GET['id'];
$query = "select * FROM Posts WHERE post_id = :id";

$post = $db->query($query, [$id])->fetch();


require "views/post.view.php";