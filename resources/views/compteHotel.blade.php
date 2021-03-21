@extends('base')
@section('title', 'Compte Hotel')
<!-- <link href="{{assert('css/compteHotel.css')}}" rel="stylesheet" type="text/css" /> -->

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Page compte Hotel </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <button class="InformationGenerale">Information générale</button>

  <br><br><button class="ReservationEnCours">Chambres réservées </button>

  <br><br><button class="ChambresDispo">Chambres disponible </button>

  <br><br><button class="HistoriqueReservation">
    Historique des réservations
  </button>

  <br><br><button class="AjouterChambre">Ajouter une chambre </button>

  <div class="Paragraphe1">
    <p>Informations générales:</p>
    <p>Ici on va afficher les informations relatives au compte hotel depuis la base de donees</p>
    <p>Nom</p>
    <p>Prenom </p>
    <p>....</p>
  </div>

  <div class="Paragraphe2">
    <p>Chambres réservées </p>
    <p>Ici on va afficher les informations relatives au reservations depuis la base de donees</p>
    <p>Date de reservation</p>
    <p>Chambre</p>
    <p>....</p>
  </div>

  <div class="Paragraphe3">
    <p>Chambres dosponibles</p>
    <p>Ici on va afficher les informations des chambres disponibles depuis la base de donees</p>
    <p>Date </p>
    <p>Chambre</p>
    <p>....</p>
  </div>

  <div class="Paragraphe4">
    <p>Historique des réservations</p>
  </div>

  <div class="Paragraphe5">
    <p>Ajouter une chambre</p>
    <p>Ici on peut inserer une chambre dans la base de donees</p>
    <p>Hotel</p>
    <p>Ville</p>
    <p>....</p>
  </div>

  <script src="js/compteHotel.js"></script>


</body>

</html>
@endsection