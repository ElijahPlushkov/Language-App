<?php
require APPLICATION . '/includes/header.php';
require CONTROLLERS . '/revise_deck.php';
?>

<div class="card-counter d-flex justify-content-center">
    <h5 class="card-title"><span class="current-card">1</span>/<span class="total-cards"></span></h5>
</div>

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
                <p class="fs-4 mb-4 p-3 bg-light">Did you answer it correctly?</p>
                <div class="d-flex justify-content-center gap-3">
                    <button class="btn btn-success" onclick="">Yes:)</button>
                    <button class="btn btn-danger" onclick="">No:(</button>
                </div>
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


<!--Deck Success Rate-->
<div class="display-final-score d-flex flex-column align-items-center justify-content-center d-none">
    <p class="final-score">Final score</p>
    <p>Deck's success rate is <span class="successRateDisplay">85%</span></p>
    <p>Comment</p>
</div>

<!--Finish and Restart buttons-->
<div class="d-flex justify-content-center gap-3 mt-4">
    <a href="create_deck" class="exit btn btn-danger btn-lg d-none">
        <i class="fas fa-sign-out-alt me-2"></i>Finish
    </a>
    <a href="revise_deck.tpl.php?deck_id=<?=$deck['deck_id']?>" class="restart btn btn-success btn-lg d-none">
        <i class="fas fa-redo me-2"></i>Restart
    </a>
</div>

<script src="<?= PATH ?>/assets/deck_actions.js"></script>
<script src="<?= PATH ?>/assets/slider.js"></script>
<script src="<?= PATH ?>/assets/success-deck-rate-counter.js"></script>
