<?php
require INCLUDES . '/header.tpl.php';
require CONTROLLERS . '/revise_deck.php';
?>

<?php foreach($cards as $card): ?>
    <div id="<?= htmlspecialchars($card['card_id']) ?>" class="card mb-4 shadow-sm">
        <div class="card-body text-center">
            <div class="card-front">
                <p class="front-text fs-4 mb-4 p-3 bg-light rounded"><?= htmlspecialchars($card['front_text']) ?></p>
                <button class="show-answer btn btn-outline-primary btn-lg">
                    <i class="fas fa-eye me-2"></i>Show Answer
                </button>
            </div>
            <div class="card-back d-none">
                <p class="back-text fs-4 mb-4 p-3 bg-light rounded"><?= htmlspecialchars($card['back_text']) ?></p>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button class="prev btn btn-secondary" onclick="prevCard()">
                    <i class="fas fa-chevron-left me-2"></i>Previous
                </button>
                <button class="next btn btn-secondary" onclick="nextCard()">
                    Next<i class="fas fa-chevron-right ms-2"></i>
                </button>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div class="d-flex justify-content-center gap-3 mt-4">
    <a href="create_deck.tpl.php" class="exit btn btn-danger btn-lg d-none">
        <i class="fas fa-sign-out-alt me-2"></i>Finish
    </a>
    <a href="revise_deck.tpl.php?deck_id=<?=$deck['deck_id']?>" class="restart btn btn-success btn-lg d-none">
        <i class="fas fa-redo me-2"></i>Restart
    </a>
</div>

<script src="<?= "PUBLIC" ?> /assets/slider.js"></script>
<script src="<?= "PUBLIC" ?> /assets/deck_actions.js"></script>
