document.addEventListener("DOMContentLoaded", function () {
    let scoreCounter = 0;
    const finalScoreDisplay = document.querySelector(".final-score-display");
    const cards = document.querySelectorAll(".card"); 

    function calculateSuccessRate() {
        const numberOfCards = cards.length;
        const successRate = (scoreCounter / numberOfCards) * 100;
        const successRateDisplay = document.querySelector(".success-rate-display");
        successRateDisplay.textContent = successRate.toFixed(2) + "%";
    }

    document.querySelectorAll(".increase-success-rate").forEach(btn => {
        btn.addEventListener("click", () => {
            scoreCounter++;
            finalScoreDisplay.textContent = scoreCounter;
            calculateSuccessRate();
        });
    });
});