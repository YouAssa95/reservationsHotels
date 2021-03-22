@extends('base')
@section('title', 'Compte Client')
<link href="{{assert('css/reservation.css')}}" rel="stylesheet" type="text/css" />
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Reservation </title>
</head>

<body>
  <form action="{{route('reservation.post')}}">

    <label for="lastName"> Entrez votre nom:<br> </label>
    <input type="name" id="lastName" name="lastName" ><br><br>

    <label for="firstName">Entrez votre prénom: <br> </label>
    <input type="name" id="firstName" name="firstName"><br><br>

    <label for="email">Entrez votre adresse mail:<br></label>
    <input type="email" id="email" name="email" ><br><br>


    <label for="phone">Entrez votre numero de téléphone:</label><br><br>
    <input type="tel" id="phone" name="phone" placeholder="07 77 77 77 77" pattern="[0-9]{10}"><br><br>

    <button type="submit" class="RegisterButton">Valider la réservation</button>
  </form>
</body>

</HTML>

@endsection