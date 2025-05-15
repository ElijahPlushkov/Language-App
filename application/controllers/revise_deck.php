<?php
require_once CONFIG . '/boot.php';

$deck_id = isset($_GET['deck_id']) ? (int)$_GET['deck_id'] : null;

$pdo = pdo();

$stmt = $pdo->prepare("SELECT * FROM decks WHERE deck_id=?");
$stmt->execute([$deck_id]);
$deck = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM cards WHERE deck_id = ? ORDER BY RAND()");
$stmt->execute([$deck['deck_id']]);
$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

