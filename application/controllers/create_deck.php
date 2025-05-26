<?php
require_once CONFIG . '/boot.php';
//require_once CORE . '/TemplateRenderer.php';
//require MODEL . '/DeckDatabase.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: do_login.php');
    exit;
}

if (!check_auth()) {
    header('Location: do_login.php');
    exit;
}

$userId = $_SESSION['user_id'];

if (isset($_POST['create-deck'])) {
    $deckName = $_POST['deck_name'];
    $sql = ("INSERT INTO `decks` (`user_id`, `deck_name`) VALUE (?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$userId, $deckName]);
}

//function showAllDecks(PDO $pdo, int $userId): string {
//    $decks = getAllDecks($pdo, $userId);
//    return render('create_deck.tpl.php', ['user_id' => $userId, 'decks' => $decks]);
//}

$sql = $pdo->prepare("SELECT * FROM `decks` WHERE user_id = ?");
$sql->execute([$userId]);
$decks = $sql->fetchAll(PDO::FETCH_ASSOC);

require VIEWS . '/create_deck.tpl.php';