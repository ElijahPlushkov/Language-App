<?php

$config = require ROOT . '/config/config.php';

return $pdo = new PDO(
    $config['database']['dsn'],
    $config['database']['username'],
    $config['database']['password'],
    $config['database']['options']
);