var loginCards = document.getElementsByClassName('login-card');

for (var i = 0; i < loginCards.length; i++) {
    var card = loginCards[i];
    var toggles = card.getElementsByClassName('login-form__toggle');
    for (var j = 0; j < toggles.length; j++)
        toggles[j].addEventListener('click', function (e) {
            card.classList.toggle('login-card_turned');

            e.preventDefault();
        });
}