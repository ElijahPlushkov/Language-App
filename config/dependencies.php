<?php

$config = require ROOT . '/config/config.php';

$pdo = new PDO(
    $config['database']['dsn'],
    $config['database']['username'],
    $config['database']['password'],
    $config['database']['options']
);

