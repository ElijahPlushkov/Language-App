<?php

function getAllCards(PDO $pdo, int $deckId): array {
    $stmt = $pdo->prepare("SELECT * FROM cards WHERE deck_id = ?");
    $stmt->execute([$deckId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}