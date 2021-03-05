@extends('base')
@section('title', 'Compte Client')
<link href="{{assert('css/compteClient.css')}}" rel="stylesheet" type="text/css" />
<script src="{{assert('js/compteClient.js')}}"></script>
@section('content')


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <!--  headers nécessaires  --> 
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

    <title>Page compte client </title>     <!-- a remplacer par nom  de notre site  -->
  
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='script.js'></script>


</BODY>
</HTML>