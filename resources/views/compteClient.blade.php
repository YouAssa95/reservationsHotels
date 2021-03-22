@extends('base')

@section('title', 'Compte Client')

@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!--  headers nécessaires  -->
  <meta charset="utf-8">

  <title>Page compte client </title> <!-- a remplacer par nom  de notre site  -->
  <link rel="stylesheet" href="css/profil.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>




  <button class="InformationGenerale">Information générale</button>

  <br><br><button class="ReservationEnCours">Mes réservations en cours</button>

  <br><br><button class="HistoriqueReservation">Historique des réservations</button>

  <br><br><button class="TrouverHotel">Trouver un hotel</button></div>

  <div class="Paragraphe1">
    <table class="table table-striped">
      <tbody>
        <tr>
          <td>Nom</td>
          <td>{{$user['lastName']}}</td>
          <td>
            <a class="btn btn-secondary" href="/">Modifier</a>
          </td>
        </tr>
        <tr>
          <td>Prénom</td>
          <td>{{$user['firstName']}}</td>
          <td>
            <a class="btn btn-secondary" href="/">Modifier</a>
          </td>
        </tr>
        <tr>
          <td>mail</td>
          <td>{{$user['email']}}</td>
          <td>
            <a class="btn btn-secondary" href="/">Modifier</a>
          </td>
        </tr>
        <tr>
          <td>Mot de passe </td>
          <td></td>
          <td>
            <a class="btn btn-secondary" href="">Modifier</a>
          </td>
        </tr>
      </tbody>
    </table>
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


</body>

</html>

@endsection