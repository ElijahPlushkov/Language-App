let scoreCounter = 0;
let finalScoreDisplay;
let successRateDisplay;
let commentDisplay;
let successRate = 0;

function calculateSuccessRate() {
    const numberOfCards = cards.length;
    successRate = ((scoreCounter / numberOfCards) * 100).toFixed(2);
    successRateDisplay.textContent = successRate + "%";

    if (successRate === 100) {
        commentDisplay.textContent = "You totally nailed it!";
    } else if (successRate >= 90) {
        commentDisplay.textContent = "Outstanding!";
    } else if (successRate >= 75) {
        commentDisplay.textContent = "Good job!";
    } else if (successRate >= 50) {
        commentDisplay.textContent = "You are almost there";
    } else {
        commentDisplay.textContent = "Keep studying";
    }
}

function successClicksCounter() {
    scoreCounter++;
    finalScoreDisplay.textContent = scoreCounter;

    calculateSuccessRate();
}

document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");
    finalScoreDisplay = document.querySelector(".final-score-display");
    successRateDisplay = document.querySelector(".success-rate-display");
    commentDisplay = document.querySelector(".comment");

    document.querySelectorAll(".increase-success-rate").forEach((btn) => {
        btn.addEventListener("click", successClicksCounter);
    });
});

const exitBtn = document.querySelector(".exit");
const restartBtn = document.querySelector(".restart");
const deckId = document.getElementById("deck-data").dataset.deckId;

function sendSuccessRate() {
    fetch("deck_success_rate", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            deck_id: deckId,
            success_rate: successRate
        })
    });
}

exitBtn.addEventListener("click", sendSuccessRate);
restartBtn.addEventListener("click", sendSuccessRate);
