<?php
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . '/public');
define("CORE", ROOT . '/core');
define("CONFIG", ROOT . '/config');
define("APPLICATION", ROOT . '/application');
define("CONTROLLERS", APPLICATION . '/controllers');
define("VIEWS", APPLICATION . '/views');
define("INCLUDES", APPLICATION . '/includes');
define("PATH", 'http://localhost:8080/language-app/');

require CORE . '/functions.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

if ($uri === 'main-page') {
    require __DIR__ . '/main-page.php';
}

else if ($uri === 'create_deck') {
    require ROOT . '/public/create_deck.php';
}

else if ($uri === 'login.php') {
    require ROOT . '/public/login.php';
}

else {
    abort();
}


