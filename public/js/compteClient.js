$(".InformationGenerale").click(function() {
    $(".Paragraphe1").show();
    $(".Paragraphe2").hide();
    $(".Paragraphe3").hide();
    $(".Paragraphe4").hide();
  });
  
  $(".ReservationEnCours").click(function() {
    $(".Paragraphe2").show();
    $(".Paragraphe1").hide();
    $(".Paragraphe3").hide();
    $(".Paragraphe4").hide();
  });
  
  $(".HistoriqueReservation").click(function() {
    $(".Paragraphe3").show();
    $(".Paragraphe1").hide();
    $(".Paragraphe2").hide();
    $(".Paragraphe4").hide();
  });
  
  $(".TrouverHotel").click(function() {
    $(".Paragraphe4").show();
    $(".Paragraphe1").hide();
    $(".Paragraphe2").hide();
    $(".Paragraphe3").hide();
  });

  $(document).ready(
    function(){
      $(".Paragraphe4").hide();
      $(".Paragraphe1").hide();
      $(".Paragraphe2").hide();
      $(".Paragraphe3").hide();
    
    }
);
  