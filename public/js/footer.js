/// barre accueill bas 


var barreB =$("<nav/>");

var items = $("<ul/>");
var icons = $("<ul/>");

var twitter = $("<li/>").attr('id','icons').html(' <a href="http://www.twitter.fr"><i class="fa fa-twitter"></i></a>');
var facebook = $("<li/>").attr('id','icons').html(' <a href="http://www.facebook.fr"><i class="fa fa-facebook"></i></a>');
var insta = $("<li/>").attr('id','icons').html(' <a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>');

icons.append(facebook,twitter,insta);



var item2 = $("<li/>").attr('id','AboutUs').html('<a href="#">Contact</a>');
var item3 = $("<li/>").attr('id','MonCompte').html('<a href="/login">Mon compte</a>');

items.append(icons,item2,item3);
barreB.append(items);

$("body").append(barreB);