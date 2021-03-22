@extends('base')
@section('title', 'Compte Hotel')
<!-- <link href="{{assert('css/compteHotel.css')}}" rel="stylesheet" type="text/css" /> -->

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Page compte Hotel </title>
  <link rel="stylesheet" href="css/profil.css">
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