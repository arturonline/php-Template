<?php

$sqlite_path = base_path("database/db.sqlite3");

return $config = [
    'sqlserver' => [
        'Server' => 'PROG-9044',
        'Database' => 'Pruebas',
    ],
    'sqlite' => [
        'Path' => 'sqlite:' . $sqlite_path,
    ],

    // more configs
];

