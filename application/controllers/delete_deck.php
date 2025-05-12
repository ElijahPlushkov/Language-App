<?php

require_once CONFIG . '/boot.php';
require CONTROLLERS . '/create_deck.php';

if (isset($_POST['delete_deck'])) {
    $deckId = $_POST['deck_id'];
    $pdo = pdo();
    $sql = "DELETE FROM decks WHERE deck_id= ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$deckId]);

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}

