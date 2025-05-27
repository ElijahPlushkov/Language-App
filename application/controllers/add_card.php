<?php

if (isset($_POST['add-card'])) {

    $deckId = $_POST['deck_id'];
    $cardQuestion = $_POST['front_text'] ?? '';
    $cardAnswer = $_POST['back_text'] ?? '';

    $sql = "INSERT INTO `cards` (`deck_id`, `front_text`, `back_text`) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$deckId, $cardQuestion, $cardAnswer]);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

header("Location: create_deck.tpl.php");
exit();
