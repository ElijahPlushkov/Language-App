<?php

function abort($code = 404) {
    http_response_code(404);
    require VIEWS . "/errors/{$code}.tpl.php";
    die;
}

//the function returns either an integer or null --> ?int (int or null)
function getUserId(array $session): ?int {
    if (!isset($session['user_id']) || $session['user_id'] === null) {
        return null;
    }
    $userId = (int) $session['user_id'];
    return $userId;
}

function getDeckId(array $get): ?int {
    if (!isset($get['deck_id'])) {
        return null;
    }
    $deckId = (int)$get['deck_id'];
    return $deckId;
}