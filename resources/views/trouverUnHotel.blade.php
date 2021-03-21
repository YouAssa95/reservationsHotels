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
                <input class="form-control col" id="Prixmax" name="Prixmax" type="Number"  value="{{old('Prixmax')}}"  min="20" placeholder="Prix maximum" />
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="wifi" id="inlineRadio1" value="wifi">
                <label class="form-check-label" for="inlineRadio1">Wifi</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="parking" id="inlineRadio2" value="parking">
                <label class="form-check-label" for="inlineRadio2">Parking</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fumeur" id="inlineRadio2" value="fumeur">
                <label class="form-check-label" for="inlineRadio2">fumeur</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="salleSport" id="inlineRadio2" value="salleSport">
                <label class="form-check-label" for="inlineRadio2">salle de Sport</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="animalFriendly" id="inlineRadio2" value="animalFriendly">
                <label class="form-check-label" for="inlineRadio2">Animal de compagnie</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Rechercher</button>

        </div>




    </form>

    @if(isset($chambresProposes))

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            @foreach ($chambresProposes as $chambre)
            <div class="col-md-4 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2"> <a href="#" id="linkImage"></a>
                        <div class="product-image" id="imageBox">

                            <script type="text/javascript">
                                // 
                                document.getElementById('linkImage').innerHTML = '<img src="media/' + 'hotel' + '{{$chambre["NumHotel"]}}' + '.jpg" />';
                                document.getElementById("linkImage").removeAttribute("id");
                            </script>

                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="{{route('hotels.show', ['NumHotel'=>$chambre['NumHotel']])}}"> {{$chambre['NomHotel']}}</a></h3> <span class="price"> &#8364; {{$chambre['prix']}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</body>

</html>
@endsection