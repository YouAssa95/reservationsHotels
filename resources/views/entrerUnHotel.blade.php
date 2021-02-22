@extends('base')
@section('head')
<link rel="stylesheet" href="{{ asset('css/styleEntrerUnHotel.css') }}">
@endsection
@section('title', 'entrer un hôtel')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{assert('js/JSentrerUnHotel.js')}}"></script>
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
    <button type="submit" value="Submit">Submit</button><br><br>



  </form>
  </div>
  <div class="chambredispo">
    <input id="addchambre" type="button" onclick="addchambrehotel()" value="chambre +"> 
    
  </div>
  </div>
@endsection