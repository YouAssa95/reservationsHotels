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

@endsection