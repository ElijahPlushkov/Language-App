<?php
require_once CONFIG . '/constants.php';

function render(string $file, array $data = []): string {
    ob_start();
    extract($data);
    require VIEWS . "/" . $file;
    return ob_get_clean();
}

