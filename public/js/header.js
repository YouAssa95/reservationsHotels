/// barre accueill Haut 

var barreH =$("<nav/>");
var items = $("<ul/>");

var item1 = $("<li/>").attr('id','logo').html('<a href="/">Groupe 4</a>');
var item2 = $("<li/>").attr('id','AboutUs').html('<a href="/aboutUs">About us</a>');
var item3 = $("<li/>").attr('id','listHot').html('<a href="/hotels">Hôtels</a>');
var item4 = $("<li/>").attr('id','MonCompte').html('<a href="/login">Mon compte</a>');

items.append(item1,item2,item3,item4);
barreH.append(items);

///////////////////////
$("body").append(barreH);
