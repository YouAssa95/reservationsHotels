@extends('base')

@section('title', 'Trouver un hôtel')

@section('content')
<form method="POST" action="{{route('trouverUnHotel.post')}}">

    <!-- Première rangée -->
    <div class="row" role="group" aria-label="...">
        <div class="col">
            <input class="form-control" name="destination" id="destination" type="text" placeholder="Saisissez votre destination" />
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
            <input class="form-control " name="Prixmin" id="Prixmin" type="Number" placeholder="Prix minimum" />
        </div>
        <div class="col">
            <input class="form-control col" id="Prixmax" name="Prixmax" type="Number" placeholder="Prix maximum" />
        </div>
        <div class="col">
            <div class="row input-group">
                <select class="form-select" id="inputGroupSelect01">
                    <option selected disabled>Équipement</option>
                    <option>Wifi</option>
                    <option value="1">Parking</option>
                    <option value="2">Salle de sport</option>
                    <option value="3">Animal de compagnie</option>
                    <option value="4">Chambre fumeur</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>

    @if(session()->get('chambresProposes'))

    <div class="row">
        @foreach (session()->get('chambresProposes') as $chambre)
        <div class="col-md-4 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2"> <a href="#"> <img class="pic-1" src='media/proposition3.jpg'> <img class="pic-2" src='media/proposition1.jpg'> </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="{{route('hotels.show', ['NumHotel'=>$chambre['NumHotel']])}}"> {{$chambre['NumHotel']}}</a></h3> <span class="price">30</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


</form>
@endsection