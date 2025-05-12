<?php
require_once CONFIG . '/boot.php';
require CONTROLLERS . '/create_deck.php';

$pdo = pdo();

$stmt = $pdo->prepare("SELECT * FROM cards WHERE deck_id = ?");
$stmt->execute([$deck['deck_id']]);
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);