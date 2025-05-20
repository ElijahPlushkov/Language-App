const cards = document.querySelectorAll(".card");
const currentCard = document.querySelector(".current-card");
let cardIndex = 0;
let cardNumber = 1;

document.addEventListener('DOMContentLoaded', function () {
    showCard();
    showNumberOfCards();
});

function showNumberOfCards() {
  const cards = document.querySelectorAll(".card");
  const numberOfCards = cards.length;
  const totalCards = document.querySelector(".total-cards");
  totalCards.textContent = numberOfCards;
};

function showCard(index) {

    cards.forEach(card => {
        card.classList.add("d-none");
    });

    if (index >= cards.length) {
        exitButton();
        restartButton();
        displayFinalScore();
        return;
    }
   
    const currentCard = cards[cardIndex];
    currentCard.classList.remove("d-none");  

    const firstCard = cards[0];
    firstCard.querySelector(".prev").classList.add("disabled");
}

function displayFinalScore() {
    const displayFinalScore = document.querySelector(".display-final-score");
    displayFinalScore.classList.remove("d-none");
}

function exitButton() {
    const exitButton = document.querySelector(".exit");
    exitButton.classList.remove("d-none");
}

function restartButton() {
    const restartButton = document.querySelector(".restart");
    restartButton.classList.remove("d-none");
}

function nextCard(){
    cardIndex++;
    showCard(cardIndex);

    const cards = document.querySelectorAll(".card");
    const numberOfCards = cards.length;

    if (cardNumber < numberOfCards) {
        cardNumber++;
        currentCard.textContent = cardNumber;
    } 
}

function prevCard(){
    cardIndex--;
    showCard(cardIndex);

    cardNumber--;
    currentCard.textContent = cardNumber;
}