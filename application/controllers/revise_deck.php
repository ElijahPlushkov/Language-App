<?php

//I can make it a function so to avoid using it directly
$deck_id = isset($_GET['deck_id']) ? (int)$_GET['deck_id'] : null;

$stmt = $pdo->prepare("SELECT * FROM decks WHERE deck_id=?");
$stmt->execute([$deck_id]);
$deck = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM cards WHERE deck_id = ? ORDER BY RAND()");
$stmt->execute([$deck['deck_id']]);
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

require VIEWS . '/revise_deck.tpl.php';