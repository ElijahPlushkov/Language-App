<?php

function abort($code = 404) {
    http_response_code(404);
    require VIEWS . "/errors/{$code}.tpl.php";
    die;
}