
///// Les deux buttons

var trouverHotel = $('<button/>');
trouverHotel.text("Trouver un hôtel ").attr("id","trouverHotel");
trouverHotel.click(function() {
    location.assign('/trouverUnHotel');
});

var entrerHotel = $('<button/>');
entrerHotel.text("Entrer un hôtel ").attr("id","entrerHotel");
entrerHotel.click(function() {
    location.assign('/entrerUnHotel');
});


var buttons=$('<div/>').attr('id','buttons').append(trouverHotel,entrerHotel);

//// Video Publicite 
var videoPub =  $('<div/>').attr('id','videoPub');

var v= $("<video/>").attr({"id":"myVideo"});
v.html(' <source src="media/myVideo.mp4" type="video/mp4" alt=" Your browser does not support HTML5 video."><source src="myVideo.ogg" type="video/ogg">');

videoPub.append(v);



/// Propositions

var propositions = $('<div/>').attr("id","propsitions");

var prop1 = $('<div/>').addClass("propsitionsImg").append($('<a/>').html('<img src="media/proposition1.jpg" alt="proposition1">'));
// prop1.attr('href',"{{route('chambres.show', ['teamId'=>$row['team_id']])}}");
// href="{{route('teams.show', ['teamId'=>$row['team_id']])}}">{{ $row['name']}}</a>
var prop2 = $('<div/>').addClass("propsitionsImg").append($('<a/>').html('<img src="media/proposition2.jpg" alt="proposition2">'));
var prop3 = $('<div/>').addClass("propsitionsImg").append($('<a/>').html('<img src="media/proposition3.jpg" alt="proposition3">'));
var prop4 =  $('<div/>').addClass("propsitionsImg").append($('<a/>').html('<img src="media/proposition4.jpg" alt="proposition4">'));

propositions.append(prop1,prop2,prop3,prop4);



///////////////////////
$("#content").append(buttons,videoPub,propositions);

