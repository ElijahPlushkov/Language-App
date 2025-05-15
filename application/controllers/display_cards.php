<?php
$cards = [];

if (!empty($deck['deck_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM cards WHERE deck_id = ?");
    $stmt->execute([$deck['deck_id']]);
    $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
