@extends('base')
@section('title', 'Compte Client')
<link href="{{assert('css/reservation.css')}}" rel="stylesheet" type="text/css" />
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <!--  headers nécessaires  --> 
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />

    <title>page reservation </title>     <!-- a remplacer par nom  de notre site  -->
  
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script>

</head>
<body>
    
    <script src="script.js"></script>

<div id="form1">

<form action="/action_page.php">
 
  <label for="name"> Entrez votre nom:<br> </label>
  <input type="name" id="name" 
  name="name" required><br><br>
  
  <label for="Lastname">Entrez votre prénom: <br> </label>
  <input type="Lastname" id="Lastname" name="Lastname" required><br><br>

  <label for="email">Entrez votre adresse mail:<br></label>
  <input type="email" id="email" 
  name="email" required><br><br>
  

  <label for="phone">Entrez votre numero de téléphone:</label><br><br>
  <input type="tel" id="phone" name="phone" placeholder="07 77 77 77 77" pattern="[0-9]{10}" required><br><br>

 <button type="submit" class="RegisterButton">Valider la réservation</button>

</form>
</div>

<div class="Paragraphe1">
<p>Informations de la réservation:</p> 
<p>Ici on va afficher les caractéristiques de la chambre depuis la base de donees</p>

</div>
</BODY>
</HTML>