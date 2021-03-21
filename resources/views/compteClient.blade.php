@extends('base')

@section('title', 'Compte Client')

@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!--  headers nécessaires  -->
  <meta charset="utf-8">

  <title>Page compte client </title> <!-- a remplacer par nom  de notre site  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <button class="InformationGenerale">Information générale</button>

  <br><br><button class="ReservationEnCours">Mes réservations en cours</button>

  <br><br><button class="HistoriqueReservation">Historique des réservations</button>

  <br><br><button class="TrouverHotel">Trouver un hotel</button>

  <div class="Paragraphe1">
    <p>Informations générales:</p>
    <p>Ici on va afficher les informations relatives au compte client depuis la base de donees</p>
    <p>Nom</p>
    <p>Prenom </p>
    <p>....</p>
  </div>

  <div class="Paragraphe2">
    <p>Mes réservations en cours</p>
    <p>Ici on va afficher les informations relatives au reservations depuis la base de donees</p>
    <p>Date de reservation</p>
    <p>Chambre</p>
    <p>....</p>
  </div>

  <div class="Paragraphe3">
    <p>Historique des réservations</p>
  </div>

  <div class="Paragraphe4">
    <p>Trouver un hotel</p>
    <p>Ici on va afficher la liste des hotels depuis la base de donees</p>
    <p>Hotel</p>
    <p>Ville </p>
    <p>....</p>
  </div>

  <script src='js/compteClient.js'></script>


</BODY>

</HTML>

@endsection