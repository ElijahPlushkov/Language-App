<?php if (empty($cards)) : ?>
    <div class="alert alert-info">No cards in this deck yet.</div>
<?php else : ?>
    <?php foreach ($cards as $card) : ?>
        <div class="card mb-3" id="card-<?= $card['card_id'] ?>">
            <div class="card-body">
                <button type="button" class="btn btn-sm btn-success me-2"
                        data-bs-toggle="modal"
                        data-bs-target="#editCardModal<?= $card['card_id'] ?>">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <button class="btn btn-sm btn-danger"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteCardModal<?= $card['card_id'] ?>"
                        name="delete_deck">
                    <i class="fas fa-trash"></i> Delete
                </button>
                <div class="card-front">
                    <p class="mb-3"><?= htmlspecialchars($card['front_text']) ?></p>
                    <button class="show-answer btn btn-sm btn-outline-primary">
                        Show Answer
                    </button>
                </div>
                <div class="card-back d-none">
                    <hr>
                    <p class="mb-0"><?= htmlspecialchars($card['back_text']) ?></p>
                </div>
            </div>
        </div>

        <!--DELETE CARD-->
        <div class="modal fade" id="deleteCardModal<?= $card['card_id'] ?>" tabindex="-1"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="delete_card.php">
                        <input type="hidden" name="card_id" value="<?= $card['card_id'] ?>">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Card</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <h5>Delete <?= $card['front_text'] ?>?</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="delete_card" class="btn btn-primary">
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--EDIT CARD-->
        <div class="modal fade" id="editCardModal<?= $card['card_id'] ?>" tabindex="-1"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="edit_card.php">
                        <input type="hidden" name="card_id" value="<?= $card['card_id'] ?>">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title fs-5">
                                <i class="fas fa-edit me-2"></i>Edit Deck
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editCardFront<?= $card['front_text'] ?>"
                                       class="form-label fw-semibold">Question</label>
                                <input type="text" name="newCardFront"
                                       class="form-control form-control-lg"
                                       id="editCardFront<?= $card['card_id'] ?>"
                                       value="<?= htmlspecialchars($card['front_text']) ?>">

                                <label for="editCardBack<?= $card['back_text'] ?>"
                                       class="form-label fw-semibold">Answer</label>
                                <input type="text" name="newCardBack"
                                       class="form-control form-control-lg"
                                       id="editCardBack<?= $card['card_id'] ?>"
                                       value="<?= htmlspecialchars($card['back_text']) ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Cancel
                            </button>
                            <button type="submit" name="editCard" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <?php endforeach; ?>
<?php endif; ?>
