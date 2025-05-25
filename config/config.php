<?php

//return [
//    'db_name' => 'flashcard_app',
//    'db_host' => '127.0.0.1',
//    'db_username' => 'root',
//    'db_password' => '',
//];


//dsn Data Source Name includes both the db_name and db_host
return [
    'app' => [
        'charset' => 'utf-8',
        'language' => 'en-US'
    ],
    'database' => [
        'dsn' => 'mysql:host=127.0.0.1;dbname=flashcard_app;charset=utf8mb4',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'template' => [
        'path' => ''
    ],
];