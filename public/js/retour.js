var accueil = $('<button/>');
accueil.text("retour");
accueil.click(function() {
    location.assign('/');
});

$('.retours').append(accueil);