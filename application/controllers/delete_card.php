<?php

require_once CONFIG . '/boot.php';

if (isset($_POST['delete_card'])) {

        $pdo = pdo();

        $cardId = $_POST['card_id'];

        $sql = "DELETE FROM cards WHERE card_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cardId]);

        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
}

header("Location: create_deck.tpl.php");
exit();