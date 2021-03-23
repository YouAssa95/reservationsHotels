@extends('base')
@section('title', 'Compte Client')
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Reservation </title>
</head>

<body>
  <form method="POST" action="{{route('getPostPdf')}}">

    <label for="lastName"> Entrez votre nom:<br> </label>
    <input type="text" id="lastName" name="lastName" ><br><br>

    <label for="firstName">Entrez votre prénom: <br> </label>
    <input type="text" id="firstName" name="firstName"><br><br>

    <label for="email">Entrez votre adresse mail:<br></label>
    <input type="email" id="email" name="email" ><br><br>


    <label for="phone">Entrez votre numero de téléphone:</label><br><br>
    <input type="tel" id="phone" name="phone" placeholder="07 77 77 77 77" pattern="[0-9]{10}"><br><br>

    <button class="RegisterButton"  >Valider la réservation</button>

  </form>

  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-6">
        <div class="col-md-4 mr-2">
          <a href="#" id="linkImage"></a>
        </div>
        <a href="">
          <h2 class="card-title">{{$chambre['NomHotel']}}</h2>
        </a>
        <p>Adress : {{$chambre['AdresseHotel']}} </p>
        <p>{{$chambre['villeHotel']}} ({{$chambre['cpHotel']}})</p>
        <p>classe : {{$chambre['classeHotel']}}</p>
        <script type="text/javascript">
          document.getElementById('linkImage').innerHTML = '<img class="card-img" src="media/' + 'ssss' + '.jpg" />';
          document.getElementById("linkImage").removeAttribute("id");
        </script>
      </div>

      <div class="col-lg-6">

        <div id="imageChambre" class="col-md-4 mr-2">
          <a href="#" id="linkImage"></a>
        </div>

    
       
        <h5 class="card-text"> Wifi {{$chambre['wifi']}}&#10003; </h5>

        
        

        <p class="card-text"><small class="text-muted">à 5 min de la gare </small></p>
        <h5><span class="price"> &#8364; </span></h5>
        <button>Réserver</button>
        <script type="text/javascript">
          document.getElementById('linkImage').innerHTML = '<img class="card-img" src="media/' + 'ssss' + '.jpg" />';
          document.getElementById("linkImage").removeAttribute("id");
        </script>
      </div>
    </div>
  
  </div>
</body>

</HTML>
<?php

 function toto() {
    // L'instance PDF avec une vue : resources/views/posts/show.blade.php
    $pdf = PDF::loadView('testpdf');

    // Lancement du téléchargement du fichier PDF
    return $pdf->download("bbb.pdf");
      /*PDF::loadView('testpdf')
      ->setPaper('a4', 'landscape')
      ->setWarnings(true)
      ->save(public_path("aaa.pdf"))
      ->download("aaa.pdf");
      */
    }
?>
@endsection