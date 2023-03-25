<?php

use Core\App;
use Core\Container;
use Core\SqliteDb;

$container = new Container();

$container->bind('Core\SqliteDb', function () {
    $config = require base_path('config.php');

    return new SqliteDb($config['sqlite']);
});

App::setContainer($container);