<?php

if (empty($_POST['username']) || empty($_POST['password'])) {
    flash('Username and password are required');
    require VIEWS . '/login.tpl.php';
    die;
} elseif ($_POST['username'] || $_POST['password']) {
    $username = trim($_POST['username']);

    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
    $stmt->execute(['username' => $_POST['username']]);

    if (!$stmt->rowCount()) {
        flash('No user with such credentials is registered');
        require VIEWS . '/login.tpl.php';
        die;
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $user['password'])) {
        if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
            $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('UPDATE `users` SET `password` = :password WHERE `username` = :username');
            $stmt->execute([
                'username' => $_POST['username'],
                'password' => $newHash,
            ]);
        }
    } elseif (!password_verify($_POST['password'], $user['password'])) {
        flash('Wrong password');
        header('Location: do_login.php');
        die;
    }
        $_SESSION['user_id'] = $user['user_id'];
        header('Location: display_welcome-page.php');
        die;
}
