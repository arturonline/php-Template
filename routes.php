<?php

// Static pages
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// Posts
$router->get('/posts', 'posts/index.php');
$router->get('/post', 'posts/show.php');
$router->delete('/post', 'posts/destroy.php');

$router->get('/posts/edit', 'posts/edit.php');
$router->patch('/post', 'posts/update.php');

$router->get('/posts/create', 'posts/create.php');
$router->post('/posts', 'posts/store.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');


$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');
$router->delete('/logout', 'sessions/destroy.php')->only('auth');
