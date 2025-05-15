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
    else {
        echo "<strong style='color:red;'>Controller file not found!</strong><br>";
        abort();
    }
}
else {
    echo "<strong style='color:red;'>No route matched.</strong><br>";
    abort();
}


//require CONFIG . '/routes.php';
//
//$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
//
//// Debug output
//echo "<hr><h4>Routing Debug</h4>";
//echo "Requested URI: <strong>$uri</strong><br>";
//echo "Routes defined:<pre>";
//print_r($routes);
//echo "</pre>";
//
//if (array_key_exists($uri, $routes)) {
//    $controller = CONTROLLERS . "/" . $routes[$uri];
//    echo "Looking for controller file at: <strong>$controller</strong><br>";
//
//    if (file_exists($controller)) {
//        require $controller;
//    } else {
//        echo "<strong style='color:red;'>Controller file not found!</strong><br>";
//        abort();
//    }
//} else {
//    echo "<strong style='color:red;'>No route matched.</strong><br>";
//    abort();
//}