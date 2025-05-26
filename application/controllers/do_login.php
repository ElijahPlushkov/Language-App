<?php
require_once CONFIG . '/boot.php';

$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");
$stmt->execute(['username' => $_POST['username']]);
if (!$stmt->rowCount()) {
    flash('No user with such credentials is registered');
//    header('Location: login.tpl.php');
    require VIEWS . '/login.tpl.php';
    die;
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['password'], $user['password'])) {
    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = pdo()->prepare('UPDATE `users` SET `password` = :password WHERE `username` = :username');
        $stmt->execute([
            'username' => $_POST['username'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['user_id'];
    header('Location: display_welcome-page.php');
//    require VIEWS . '/welcome_page.tpl.php';
    die;
}

flash('Wrong password');
//header('Location: do_login.php');