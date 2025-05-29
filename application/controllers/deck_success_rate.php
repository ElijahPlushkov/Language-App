<?php

$json = file_get_contents("php://input");

$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

$deckId = getDeckId($data);

$receivedSuccessRate = isset($data['success_rate']) ? (float)$data['success_rate'] : null;

if (!$deckId || $receivedSuccessRate === null) {
    http_response_code(422);
    echo json_encode(['error' => 'Missing or invalid data']);
    exit;
}

$stmt = $pdo->prepare("SELECT success_rate, number_of_attempts FROM decks WHERE deck_id=?");
$stmt->execute([$deckId]);
$deck = $stmt->fetch(PDO::FETCH_ASSOC);

$currentSuccessRate = $deck['success_rate'];
$currentNumberOfAttempts = $deck['number_of_attempts'];

$updatedNumberOfAttempts = $currentNumberOfAttempts + 1;

$updatedSuccessRate = round((($currentSuccessRate * $currentNumberOfAttempts) + $receivedSuccessRate) / $updatedNumberOfAttempts);

$sql = "UPDATE decks SET success_rate = ?, number_of_attempts = ? WHERE deck_id = ?";
$query = $pdo->prepare($sql);
$query->execute([$updatedSuccessRate, $updatedNumberOfAttempts, $deckId]);

echo json_encode(['status' => 'success']);
