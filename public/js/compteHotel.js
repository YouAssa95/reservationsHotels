$(".InformationGenerale").click(function() {
    $(".Paragraphe1").show();
    $(".Paragraphe2").hide();
    $(".Paragraphe3").hide();
    $(".Paragraphe4").hide();
    $(".Paragraphe5").hide();
  });
  
  $(".ReservationEnCours").click(function() {
    $(".Paragraphe2").show();
    $(".Paragraphe1").hide();
    $(".Paragraphe3").hide();
    $(".Paragraphe4").hide();
    $(".Paragraphe5").hide();
  });
  
  $(".ChambresDispo").click(function() {
    $(".Paragraphe3").show();
    $(".Paragraphe1").hide();
    $(".Paragraphe2").hide();
    $(".Paragraphe4").hide();
    $(".Paragraphe5").hide();
  });
  
  $(".HistoriqueReservation").click(function() {
    $(".Paragraphe4").show();
    $(".Paragraphe1").hide();
    $(".Paragraphe2").hide();
    $(".Paragraphe3").hide();
    $(".Paragraphe5").hide();
  });
  
  $(".AjouterChambre").click(function() {
    $(".Paragraphe5").show();
    $(".Paragraphe1").hide();
    $(".Paragraphe2").hide();
    $(".Paragraphe3").hide();
    $(".Paragraphe4").hide();
  });

  $(document).ready(
    function(){
      $(".Paragraphe4").hide();
      $(".Paragraphe1").hide();
      $(".Paragraphe2").hide();
      $(".Paragraphe3").hide();
      $(".Paragraphe5").hide();
    }
);