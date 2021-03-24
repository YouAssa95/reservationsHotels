@extends('base')

@section('title', 'Trouver un hôtel')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <link rel="stylesheet" href="{{ asset('css/advancedHotel.css') }}">
</head>

<body>

     <form method="POST" action="{{route('trouverUnHotel.post')}}"> 
    

        <!-- Première rangée -->
        <div class="row" role="group" aria-label="...">
            <div class="col">
                <input class="form-control" name="destination" id="destination" type="text" value="{{old('destination')}}" placeholder="Saisissez votre destination" />
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text">Date d'arrivée</span>
                <input class="form-control" name="dateA" id="DateA" type="date" />
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text">Date de départ</span>
                <input class="form-control" name="dateD" id="DateD" type="date" />
            </div>
            <div class="input-group mb-3 col">
                <select name="nbreLits" class="form-select" id="inputGroupSelect01">
                    <option selected disabled="">Nombre de lit</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
        <!-- Deuxième rangée -->
        <div class="row" role="group" aria-label="...">
            <div class="col">
                <input class="form-control " name="Prixmin" id="Prixmin" type="Number" value="{{old('Prixmin')}}" min="0" placeholder="Prix minimum" />
            </div>
            <div class="col">
                <input class="form-control col" id="Prixmax" name="Prixmax" type="Number" value="{{old('Prixmax')}}" min="20" placeholder="Prix maximum" />
            </div>
            <div class="form-check form-check-inline ">
                <input type="checkbox" id="inlineRadio1" class="mr-2" name="wifi" class="form-control" @if(old('wifi')=='on' )) checked @endif>
                <label class="form-check-label mr-2" for="inlineRadio1"> Wifi</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="inlineRadio2" class="mr-2" name="parking" class="form-control" @if(old('parking')=='on' )) checked @endif>
                <label class="form-check-label" for="inlineRadio2">Parking</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="inlineRadio3" class="mr-2" name="fumeur" class="form-control" @if(old('fumeur')=='on' )) checked @endif>
                <label class="form-check-label" for="inlineRadio3">fumeur</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="inlineRadio4" class="mr-2" name="salleSport" class="form-control" @if(old('salleSport')=='on' )) checked @endif>
                <label class="form-check-label" for="inlineRadio4">salle de Sport</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" id="inlineRadio5" class="mr-2" name="animalFriendly" class="form-control" @if(old('animalFriendly')=='on' )) checked @endif>
                <label class="form-check-label" for="inlineRadio5">Animal de compagnie</label>
            </div>
            <br>
            <button type="submit" class="buttonSite">Rechercher</button>

        </div>




    </form>

    @if(isset($chambresProposes))

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            @foreach ($chambresProposes as $chambre)
            <div class="card mb-3 mr-2" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4 mr-2">
                        <a href="#" id="linkImage"></a>
                    </div>
                    <div class="col-md-4 mr-2">
                        <a href="{{route('hotels.show', ['NumHotel'=>$chambre['NumHotel']])}}">
                            <h2 class="card-title">{{ $chambre['NomHotel'] }} </h2>
                            
                        </a>
                        <a class= "btn btn-primary"  role="button" href="{{route('reservation.show',['idChambre' => $chambre['idChambre']])}}">
                          voir plus
                        </a>
                    </div>
                    <script type="text/javascript">
                        // "media/' + 'hotel' + '{{$chambre["NumHotel"]}}' + '.jpg"
                        document.getElementById('linkImage').innerHTML = '<img class="card-img" src="media/' +'{{$chambre["logoHotel"]}}'+ '.jpg" />';
                        document.getElementById("linkImage").removeAttribute("id");
                    </script>

                    <div class="col-md-8">
                        <div class="card-body">
                            @if(isset( $chambre['equipement']) && ($chambre['equipement']['wifi']==1) )
                            <h5 class="card-text"> Wifi &#10003; </h5>
                            @endif
                            @if(isset( $chambre['equipement']) && ($chambre['equipement']['parking']==1) )
                            <h5 class="card-text"> parking &#10003;</h5>
                            @endif
                            @if(isset( $chambre['equipement']) && ($chambre['equipement']['salleSport']==1) )
                            <h5 class="card-text"> salle de sport &#10003;</h5>
                            @endif
                            @if(isset( $chambre['equipement']) && ($chambre['equipement']['animalFriendly']==1) )
                            <h5 class="card-text"> Animal de compagnie &#10003;</h5>
                            @endif
                            <p class="card-text"><small class="text-muted">à 5 min de la gare </small></p>
                            <h5><span class="price"> &#8364; {{$chambre['prix']}}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2"> <a href="#" id="linkImage"></a>
                        <div class="product-image" id="imageBox">

                            <script type="text/javascript">
                                // 
                                document.getElementById('linkImage').innerHTML = '<img src="media/' + 'hotel' + '{{$chambre["NumHotel"]}}' + '.jpg" />';
                                document.getElementById("linkImage").removeAttribute("id");
                            </script>

                            
                        </div>
                        
                        <div class="product-content">
                            <h3 class="title"><a href="{{route('hotels.show', ['NumHotel'=>$chambre['NumHotel']])}}"> {{$chambre['NomHotel']}}</a></h3> <span class="price"> &#8364; {{$chambre['prix']}}</span>
                        </div>
                    </div>
                </div>
            </div> -->
            @endforeach
        </div>
    </div>
    @endif
</body>

</html>
@endsection