<?php

session_start();

$pdo = require CONFIG . "/dependencies.php";

function flash(?string $message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
            <div class="alert alert-danger mb-3">
                <?=$_SESSION['flash']?>
            </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

function check_auth(): bool
{
    return !!($_SESSION['user_id'] ?? false);
}

$user = null;

//if the user is logged in, take their username and display it in the header.tpl.php
if (check_auth()) {
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `user_id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $userDisplay = htmlspecialchars($user['username']);
} else {
    $userDisplay = "Stranger";
}
