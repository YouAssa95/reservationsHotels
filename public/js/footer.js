/// barre accueill bas 


var barreB =$("<nav/>").attr('id','footer');

var items = $("<ul/>");
var icons = $("<ul/>");

var twitter = $("<li/>").attr('id','icons').html(' <a href="http://www.twitter.fr">| <i class="fa fa-twitter"> |</i></a>');
var facebook = $("<li/>").attr('id','icons').html(' <a href="http://www.facebook.fr"><i class="fa fa-facebook"></i></a>');
var insta = $("<li/>").attr('id','icons').html(' <a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>');

icons.append(facebook,twitter,insta);



var item2 = $("<li/>").attr('id','contact').html('<a href="/contact">Contact</a>');

items.append(icons,item2);
barreB.append(items);

$("body").append(barreB);
