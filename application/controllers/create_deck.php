<?php

require MODEL . '/DeckDatabase.php';

//if (!isset($_SESSION['user_id'])) {
//    header('Location: do_login.php');
//    exit;
//}
//
//if (!check_auth()) {
//    header('Location: do_login.php');
//    exit;
//}

$userId = $_SESSION['user_id'];

if (isset($_POST['create-deck'])) {
    $deckName = $_POST['deck_name'];
    $sql = ("INSERT INTO `decks` (`user_id`, `deck_name`) VALUE (?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$userId, $deckName]);
}

function showAllDecks(PDO $pdo, int $userId): array {
    $decks = getAllDecks($pdo, $userId);
    return $decks;
}

$decks = showAllDecks($pdo, $userId);

require VIEWS . '/create_deck.tpl.php';