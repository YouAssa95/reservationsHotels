var accueil = $('<button/>');
accueil.text("retour vers la page d'accueil");
accueil.click(function() {
    //sessionStorage.removeItem('hotelId');
    // sessionStorage.clear();
    localStorage.clear();
    //Session.abondon();
    //session.setItem("hotelId") = null;
    //sessionInfo.Item("hotelId") = null;
    location.assign('/');
});

$('.retours').append(accueil);