<?php

$deckId = getDeckId($_GET);

$stmt = $pdo->prepare("SELECT * FROM decks WHERE deck_id=?");
$stmt->execute([$deckId]);
$deck = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM cards WHERE deck_id = ? ORDER BY RAND()");
$stmt->execute([$deck['deck_id']]);
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

require VIEWS . '/revise_deck.tpl.php';