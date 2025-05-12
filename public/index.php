<?php

define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . '/public');
define("CORE", ROOT . '/core');
define("CONFIG", ROOT . '/config');
define("APPLICATION", ROOT . '/application');
define("CONTROLLERS", APPLICATION . '/controllers');
define("VIEWS", APPLICATION . '/views');
define("INCLUDES", APPLICATION . '/includes');
define("PATH", 'http://localhost:8080/language app');

//require CORE . '/funcs.php'; //add main functions

require '../main-page.php';