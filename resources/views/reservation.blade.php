@extends('base')


@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
  <link rel="stylesheet" href="{{ asset('css/advancedHotel.css') }}">
</head>

<body>
 

  <div class="container-fluid">

    <div class="row">
    <!-- //// Partie hotel  -->
      <div class="col-lg-6">
        <div class="col-md-4 mr-2">
          <a href="#" id="linkImage"></a>
        </div>
        <a href="">
          <h2 class="card-title">{{$chambre['NomHotel']}}</h2>
        </a>
        <p id="classeH"> </p>
        <p> {{$chambre['AdresseHotel']}} </p>
        <p>{{$chambre['villeHotel']}} ({{$chambre['cpHotel']}})</p>
        <p class="card-text"><small class="text-muted">à 5 min de la gare </small></p>
        <p hidden id="classeD">{{$chambre['classeHotel']}}</p>

        <script id="script1" type="text/javascript">
          var classeP = document.getElementById('classeD')
          var classe = parseInt(classeP.textContent);
          document.getElementById('linkImage').innerHTML = '<img class="card-img" src="/media/' + 'ssss' + '.jpg" />';

          var etoile = '&#11088;';
          for (let i = 1; i < classe; i++) {
            etoile = etoile + ' &#11088;';
          }
          document.getElementById('classeH').innerHTML = `<p>${etoile}</p>`;
          document.getElementById("linkImage").removeAttribute("id");
        </script>
      </div>

              <!-- //// Partie chambre   -->
      <div class="col-lg-6">
        <div id="imageChambre" class="col-md-6 mr-2">
          <div id="imageCh"></div>
          <!-- <img class="pic-1" id="pic1" src='/media/proposition3.jpg'> <img class="pic-2"  id="pic2" src='/media/proposition1.jpg'>  -->
        </div>

          <br>

        @if($chambre['NbreLits']==1)
        <h5 class="card-text"> {{$chambre['NbreLits']}} lit  </h5>
        @else
        <h5 class="card-text"> {{$chambre['NbreLits']}} lits  </h5>
        @endif
        <h5 class="card-text"> {{$chambre['Surface']}} m²  </h5>
        

        @if(isset($chambre['wifi']))
        <h5 class="card-text"> Wifi  &#10003; </h5>
        @endif
        @if($chambre['parking'])
        <h5 class="card-text"> parking &#10003;</h5>
        @endif

        @if($chambre['salleSport'])
        <h5 class="card-text"> salle de sport &#10003;</h5>
        @endif

        @if($chambre['animalFriendly'])
        <h5 class="card-text"> Animal de compagnie &#10003;</h5>
        @endif

        @if($chambre['Fumeur'])
        <h5 class="card-text"> espace fumeur &#10003;</h5>
        @endif


        
        <h5><span class="price"> {{$chambre['prix']}} &#8364; </span></h5>
        <a href="{{route('reservationShowForm',['idChambre' => $chambre['idChambre']])}}" role="button" class="btn btn-primary">Réserver</a>
        <!-- <button ></button> -->
        <script type="text/javascript">
          document.getElementById('imageCh').innerHTML = '<img class="card-img" src="/media/' + 'proposition1.jpg" />';
          // document.getElementById("linkImage").removeAttribute("id");
        </script>
      </div>
    </div>

  
</body>

</HTML>

@endsection