var accueil = $('<button/>');
accueil.text("retour vers la page d'accueil");
accueil.click(function() {
    //sessionStorage.removeItem('hotelId');
   // sessionStorage.clear();
    Session.abondon();
    location.assign('/');
});

$('.retours').append(accueil);