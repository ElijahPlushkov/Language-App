<?php
require_once CONFIG . '/boot.php';

$json = file_get_contents("php://input");

$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

$deck_id = isset($data['deck_id']) ? (int)$data['deck_id'] : null;
$receivedSuccessRate = isset($data['success_rate']) ? (float)$data['success_rate'] : null;

if (!$deck_id || $receivedSuccessRate === null) {
    http_response_code(422);
    echo json_encode(['error' => 'Missing or invalid data']);
    exit;
}

$pdo = pdo();

$stmt = $pdo->prepare("SELECT success_rate, number_of_attempts FROM decks WHERE deck_id=?");
$stmt->execute([$deck_id]);
$deck = $stmt->fetch(PDO::FETCH_ASSOC);

$currentSuccessRate = $deck['success_rate'];
$currentNumberOfAttempts = $deck['number_of_attempts'];

$updatedNumberOfAttempts = $currentNumberOfAttempts + 1;

$updatedSuccessRate = (($currentSuccessRate * $currentNumberOfAttempts) + $receivedSuccessRate) / $updatedNumberOfAttempts;

$sql = "UPDATE decks SET success_rate = ?, number_of_attempts = ? WHERE deck_id = ?";
$query = $pdo->prepare($sql);
$query->execute([$updatedSuccessRate, $updatedNumberOfAttempts, $deck_id]);

echo json_encode(['status' => 'success']);
