<?php

if (isset($_POST['edit_deck_name'])) {
    $newDeckName = $_POST['new_deck_name'];
    $deckId = $_POST['deck_id'];
    $sql = "UPDATE decks SET deck_name= ? WHERE deck_id= ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$newDeckName, $deckId]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}