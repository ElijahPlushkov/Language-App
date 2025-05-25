<?php

//require_once CONFIG . '/boot.php';
//
//$pdo = pdo();

//$stmt = $pdo->prepare("SELECT * FROM cards WHERE deck_id = ?");
//$stmt->execute([$deck['deck_id']]);
//$cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once CORE . '/TemplateRenderer.php';
require MODEL . '/CardDatabase.php';

function showAllCards(PDO $pdo, int $deckId): string {
    $cards = getAllCards($pdo, $deckId);
    return render('card_display.tpl.php', ['deck_id' => $deckId, 'cards' => $cards]);
}