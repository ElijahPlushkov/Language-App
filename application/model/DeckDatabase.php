<?php

function getAllDecks(PDO $pdo, int $userId): array {
    $sql = $pdo->prepare("SELECT * FROM `decks` WHERE user_id = ?");
    $sql->execute([$userId]);
    $decks = $sql->fetchAll(PDO::FETCH_ASSOC);
}