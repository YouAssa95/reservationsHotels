@extends('base')
@section('head')
<link rel="stylesheet" href="{{ asset('css/styleEntrerUnHotel.css') }}">
@endsection
@section('title', 'entrer un hôtel')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{asset('js/JSentrerUnHotel.js')}}"></script>
	<div class="partietotal">
	<div class="partie1">
	<h1> entrer un hôtel</h1>

  <form action="/action_page.php">
    
    <label for="myfile">Sélectionner un logo:</label>
    <input class="logo" type="file" name="applicant.fileUpload" id="logo hotel" tabindex="0" accept=".png,.JFIF,.pdf"><br><br>

    <input class="chain" type="text" id="fname" name="fname" placeholder="nom d'hôtel"><br><br>
   
    <input class="chain" type="text" id="adresse" name="adress" placeholder="adresse de l'hôtel"><br><br>
    
    <input type="number" id="codepostal" name="codepostal" placeholder="code postal">
    
    <input type="text" id="adresse" name="ville" placeholder="Ville de l'hôtel"><br><br>

    <input class="chain" type="tel" id="telephone" name="telephone" placeholder="numéro de téléphone"><br><br>


    <input class="chain" type="email" id="email" name="mail" placeholder="l'email de l'hôtel"><br><br>
    
    <input class="chain" type="password" id="pass" name="mote de pass" placeholder="mote de pass"><br><br>
    <button type="submit" value="Submit">Valider</button><br><br>
    <button onclick="document.location='default.asp'">Retour</button><br><br>


  </form>
  </div>
  <div class="chambredispo">
    <span><button  class="addchambre"  onclick="addchambrehotel()">chambre 
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>

  </button></span>
    <span></span>
  </div>
  </div>
@endsection