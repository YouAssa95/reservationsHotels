@extends('base')
@section('title', 'trouver un hôtel')
<link href="{{assert('css/style_trouverUnHotel.css')}}" rel="stylesheet" type="text/css" />
<script src="{{assert('js/JStrouverUnHotel.js')}}"></script>
@section('content')



<form action="/action_page.php">

    <div>
        <h1>Trouver un hôtel </h1>
    </div>
    <!-- Première rangée -->
    <div id="background">
        <div class="row" role="group" aria-label="...">
            <div class="col">
                <input class="form-control" id="Destination" type="text" placeholder="Saisissez votre destination" />
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text">Date d'arrivée</span>
                <input class="form-control" id="DateArrivé" type="date" />
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text">Date de départ</span>
                <input class="form-control" id="DateDépart" type="date" />
            </div>
            <div class="input-group mb-3 col">
                <select class="form-select" id="inputGroupSelect01">
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
                <input class="form-control " id="Prixmin" type="Number" placeholder="Prix minimum" />
            </div>
            <div class="col">
                <input class="form-control col" id="Prixmax" type="Number" placeholder="Prix maximum" />
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
            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="trouverunechambre()">Rechercher</button>
            </div>
            <div class="row">
                <div class="col test"></div>
                <div class="col test"></div>
                <div class="col test"></div>
            </div>
        </div>

        <!--Partie JavaScript avec Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            // A FAIRE PARTIE JS AVEC JQUERY
            i = 0;

            // function trouverunechambre() {
        </script>
@endsection