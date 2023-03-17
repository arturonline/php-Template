<?php

$heading = "Blog";



$config = require('config.php');
$db = new Database($config['database']);

$posts = $db->query('select * FROM Blog.posts')->fetchAll();

/*
$id = $_GET['id'];
$query = "select * FROM Blog.posts WHERE Id = :id";


$posts = $db->query($query,[':id' => $id])->fetch();

dd($posts);
*/

require "views/blog.view.php";