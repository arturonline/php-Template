<?php

// Static pages
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Posts
$router->get('/posts', 'controllers/posts/index.php');
$router->get('/post', 'controllers/posts/show.php');
$router->delete('/post', 'controllers/posts/destroy.php');

$router->get('/posts/create', 'controllers/posts/create.php');
$router->post('/posts', 'controllers/posts/store.php');
