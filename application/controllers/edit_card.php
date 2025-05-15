<?php

require_once CONFIG . '/boot.php';

if (isset($_POST['editCard'])) {
    $pdo = pdo();

    $newCardFront = $_POST['newCardFront'];
    $newCardBack = $_POST['newCardBack'];
    $cardId = $_POST['card_id'];

    $sql = "UPDATE cards SET front_text= ?, back_text= ? WHERE card_id= ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$newCardFront, $newCardBack, $cardId]);

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}

header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
