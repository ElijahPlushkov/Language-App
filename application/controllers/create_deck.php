<?php

require_once CONFIG . '/boot.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (!check_auth()) {
    header('Location: login.php');
    exit;
}

$pdo = pdo();

$userId = $_SESSION['user_id'];

if (isset($_POST['create-deck'])) {
    $deckName = $_POST['deck_name'];
    $sql = ("INSERT INTO `decks` (`user_id`, `deck_name`) VALUE (?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$userId, $deckName]);

}

$sql = $pdo->prepare("SELECT * FROM `decks` WHERE user_id = ?");
$sql->execute([$userId]);
$decks = $sql->fetchAll(PDO::FETCH_ASSOC);

$deck = $decks[0] ?? null;

if ($deck) {
    require CONTROLLERS . '/display_cards.php';
}

require VIEWS . '/create_deck.tpl.php';

