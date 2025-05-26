<?php

require CONFIG . '/routes.php';

$requestedUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = parse_url(PATH, PHP_URL_PATH);
$uri = trim(str_replace($basePath, '', $requestedUri), '/');


echo "<hr><h4>Routing Debug</h4>";
echo "Requested URI: <strong>$uri</strong><br>";
echo "Routes defined:<pre>";
print_r($routes);
echo "</pre>";

if (array_key_exists($uri, $routes)) {
    if (file_exists(CONTROLLERS . "/{$routes[$uri]}")) {
        require CONTROLLERS . "/{$routes[$uri]}";
    }
//    else if (file_exists(VIEWS . "/{$routes[$uri]}")) {
//        require VIEWS . "/{$routes[$uri]}";
//    }

    else {
        echo "<strong style='color:red;'>Controller file not found!</strong><br>";
        abort();
    }
}
else {
    echo "<strong style='color:red;'>No route matched.</strong><br>";
    abort();
}