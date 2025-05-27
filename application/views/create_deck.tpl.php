<?php

require VIEWS . '/header.tpl.php';

?>

<body class="bg-light">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5">My Decks</h1>
        <button class="btn btn-info" onclick="addNewDeck()">
            <i class="fas fa-plus"></i> Add New Deck
        </button>
    </div>

    <form class="deck-form d-none card p-3 mb-4 bg-white shadow-sm" method="POST">
        <div class="input-group">
            <input type="text" class="form-control deck-name-input" placeholder="Deck name" name="deck_name">
            <button type="submit" class="btn btn-primary create-deck" name="create-deck">Create Deck</button>
        </div>
    </form>

    <div id="decksDisplay">
        <?php foreach ($decks as $deck): ?>
        <div class="deck card mb-4 shadow-sm" id="<?= htmlspecialchars($deck['deck_id']) ?>">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0 deck-name"><?= htmlspecialchars($deck['deck_name']) ?></h2>
                    <div>
                        <button class="btn btn-sm btn-light me-2 decks-display__success-rate">
                            <i class="fa-solid fa-circle"></i> <?= htmlspecialchars($deck['success_rate']) ?>%
                        </button>
                        <a href="revise_deck.php?deck_id=<?= $deck['deck_id'] ?>"
                           class="btn btn-sm btn-info me-2">
                            <i class="fa-solid fa-book"></i> Revise
                        </a>
                        <button type="button" class="btn btn-sm btn-success me-2"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal<?= $deck['deck_id'] ?>">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-danger"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $deck['deck_id'] ?>"
                                name="delete_deck">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-lg add-new-card"
                            data-deck-id="<?= $deck['deck_id'] ?>"
                            data-bs-toggle="modal"
                            data-bs-target="#addCard">
                        <i class="fas fa-plus"></i> Add New Card
                    </button>

                    <button type="button" class="btn btn-success btn-lg toggle-card-display"
                            data-deck-id="<?= $deck['deck_id'] ?>"> Hide Cards
                    </button>
                </div>

                <div class="card-display" id="cardsForDeck<?= $deck['deck_id'] ?>">
                    <?php
                    require_once CONTROLLERS . '/display_cards.php';
                    echo showAllCards($pdo, $deck['deck_id']);
                    ?>
                </div>

                <!--EDIT DECK-->
                <div class="modal fade" id="editModal<?= $deck['deck_id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="edit_deck.php">
                                <input type="hidden" name="deck_id" value="<?= $deck['deck_id'] ?>">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title fs-5">
                                        <i class="fas fa-edit me-2"></i>Edit Deck
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="editDeckName<?= $deck['deck_id'] ?>" class="form-label fw-semibold">Deck
                                            Name</label>
                                        <input type="text" name="new_deck_name" class="form-control form-control-lg"
                                               id="editDeckName<?= $deck['deck_id'] ?>"
                                               value="<?= htmlspecialchars($deck['deck_name']) ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </button>
                                    <button type="submit" name="edit_deck_name" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--DELETE DECK-->
                <div class="modal fade" id="deleteModal<?= $deck['deck_id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="delete_deck.php">
                                <input type="hidden" name="deck_id" value="<?= $deck['deck_id'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Deck</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <h5>Delete <?= $deck['deck_name'] ?>?</h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="delete_deck" class="btn btn-primary">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!--ADD CARD-->
        <div class="modal fade" id="addCard" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="add_card.php">
                        <input type="hidden" name="deck_id" id="deckId">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title fs-5">Add New Card</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="frontText" class="form-label">Question</label>
                                <input type="text" class="form-control mb-3 card-question-input" id="frontText"
                                       placeholder="Enter your question" name="front_text" required>
                            </div>
                            <div class="mb-3">
                                <label for="backText" class="form-label">Answer</label>
                                <input type="text" class="form-control card-answer-input" id="backText"
                                       placeholder="Enter the answer" name="back_text" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel
                            </button>
                            <button type="submit" name="add-card" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Add Card
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="<?= PATH ?>/assets/deck_actions.js"></script>
</body>