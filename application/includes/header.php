<?php
require_once CONFIG . '/boot.php';

if (check_auth()) {
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `user_id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $userDisplay = htmlspecialchars($user['username']);
} else {
    $userDisplay = "Stranger";
}