@extends('base')
@section('title', 'Compte Hotel')
<link href="{{assert('css/compteHotel.css')}}" rel="stylesheet" type="text/css" />
<script src="{{assert('js/compteHotel.js')}}"></script>
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <!--  headers nécessaires  --> 
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

    <title>Page compte Hotel </title>     <!-- a remplacer par nom  de notre site  -->
  
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>

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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='script.js'></script>


</BODY>
</HTML>