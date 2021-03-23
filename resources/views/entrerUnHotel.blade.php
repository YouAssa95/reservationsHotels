@extends('base')
@section('head')
<link rel="stylesheet" href="{{ asset('css/styleEntrerUnHotel.css') }}">
@endsection
@section('title', 'entrer un hôtel')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- /* *****************************************************************************************************/ -->
<CENTER><FONT COLOR="black" SIZE="5" ><strong>
Crée votre Compte Manager</strong> </CENTER></FONT>
<CENTER><FONT COLOR="black" SIZE="3"><em><strong>Entrez vous information ainssi que les données de votre Hôtel</strong></em></CENTER></FONT><BR><BR><BR>
<!-- /* *****************************************************************************************************/ -->


<form method="POST" action="{{route('registerUnHotel.post')}}" >
<!-- novalidate -->
  <div class="partietotal">
	  <div class="partie1">
	    <h1> données hôtel</h1>
      <!-- ************************************************************* -->
      @if ($errors->any())
          <div class="alert alert-warning">
              L'hôtel n'a pas pu être ajoutée &#9785;
              {{$errors}}
          </div>
      @endif
    <!-- ************************************************************* -->
        <div class="form-group">
          <label for="logoHotel">Sélectionner un logo :</label><br>
          <input  type="file" name="logoHotel" id="logoHotel" tabindex="0" accept=".png,.JFIF,.pdf" aria-describedby="logoHotel_feedback" class="form-control @error('logoHotel') is-invalid @enderror" required><br>
          @error('logoHotel')
            <div id="logoHotel_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div> 
 <!-- ************************************************************* -->
        <div class="form-group">
          <label for="NomHotel"> nom d'hôtel :</label><br>
          <input  type="text" id="NomHotel" name="NomHotel" value="{{ old('NomHotel') }}" placeholder="nom d'hôtel" aria-describedby="NomHotel_feedback" class="form-control @error('NomHotel') is-invalid @enderror" required><br>
          @error('NomHotel')
            <div id="NomHotel_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
 <!-- ************************************************************* -->
 
        <div class="form-group">
          <label for="NomGerant">nom de gérant :</label><br>
          <input  type="text" id="NomGerant" name="NomGerant" value="{{ old('NomGerant') }}" placeholder="nom de gérant" aria-describedby="NomGerant_feedback" class="form-control @error('NomGerant') is-invalid @enderror" required><br>
          @error('NomGerant')
            <div id="NomGerant_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
 <!-- ************************************************************* -->
        <div class="form-group" >
          <label for="PrenGerant">prénom de gérant :</label><br>
          <input  type="text" id="PrenGerant" name="PrenGerant" value="{{ old('PrenGerant') }}" placeholder="prénom de gérant" aria-describedby="PrenGerant_feedback" class="form-control @error('PrenGerant') is-invalid @enderror" required><br>
          @error('PrenGerant')
            <div id="PrenGerant_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
 <!-- ************************************************************* -->
        <div class="form-group">
          <label for="DateNaissGerant">date de naissance :</label><br>
          <input  type="date" id="DateNaissGerant" name="DateNaissGerant" value="{{ old('DateNaissGerant') }}" aria-describedby="DateNaissGerant_feedback" class="form-control @error('DateNaissGerant') is-invalid @enderror" required><br>
          @error('DateNaissGerant')
            <div id="DateNaissGerant_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
<!-- ************************************************************* -->
        <div class="form-group">
          <label for="AdresseHotel">adresse de l'hôtel :</label><br>
        <input  type="text" id="AdresseHotel" name="AdresseHotel" placeholder="adresse de l'hôtel" value="{{ old('AdresseHotel') }}" aria-describedby="AdresseHotel_feedback" class="form-control @error('AdresseHotel') is-invalid @enderror" required><br>
        @error('AdresseHotel')
            <div id="AdresseHotel_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
<!-- ************************************************************* -->
        <div class="form-group">
          <label for="cpHotel">code postal :</label><br>
        <input type="number" id="cpHotel" name="cpHotel" placeholder="code postal" value="{{ old('cpHotel') }}" aria-describedby="cpHotel_feedback" class="form-control @error('cpHotel') is-invalid @enderror" required><br>
        @error('cpHotel')
            <div id="cpHotel_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
<!-- ************************************************************* -->
        <div class="form-group">
          <label for="villeHotel">Ville de l'hôtel :</label><br>
          <input type="text" id="villeHotel" name="villeHotel" placeholder="Ville de l'hôtel" value="{{ old('villeHotel') }}" aria-describedby="villeHotel_feedback" class="form-control @error('villeHotel') is-invalid @enderror" required><br>
          @error('villeHotel')
            <div id="villeHotel_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
<!-- ************************************************************* -->
        <div class="form-group">
          <label for="classeHotel">class de l'hôtel :</label><br>
          <select id="classeHotel" name="classeHotel" aria-describedby="classeHotel_feedback" class="form-control @error('classeHotel') is-invalid @enderror" >
            <option value="1"> 1 étoile </option>
            <option value="2"> 2 étoiles</option>
            <option value="3"> 3 étoiles</option>
            <option value="4"> 4 étoiles</option>
            <option value="5"> 5 étoiles</option> 
          </select>
          @error('classeHotel')
            <div id="classeHotel_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
<!-- ************************************************************* -->
        <div class="form-group">
          <label for="emailHotel">l'email de l'hôtel :</label><br>
          <input type="email" id="emailHotel" name="emailHotel" placeholder="l'email de l'hôtel" value="{{ old('emailHotel') }}" aria-describedby="emailHotel_feedback" class="form-control @error('emailHotel') is-invalid @enderror" required><br>
          @error('emailHotel')
            <div id="emailHotel_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

<!-- ************************************************************* -->
        <div class="form-group">
          <label for="MtdPass">mot de passe :</label><br>
          <input  type="password" id="MtdPass" name="MtdPass" placeholder="mot de passe" value="{{ old('MtdPass') }}" aria-describedby="MtdPass_feedback" class="form-control @error('MtdPass') is-invalid @enderror" required><br>
          @error('MtdPass')
            <div id="MtdPass_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
<!-- ************************************************************* -->
      
       
         
    </div>




  

    <div class="partie2" id="chambre">
      <h1> données chambre</h1>
        <!-- **************************************************************************************************************************************************** -->
          <div class="form-group">
             <label for="ImagChambre">Sélectionner une Image :</label><br>
             <input  type="file" name="ImagChambre" id="ImagChambre" tabindex="0" accept=".png,.JFIF,.pdf" aria-describedby="ImagChambre_feedback" class="form-control @error('ImagChambre') is-invalid @enderror" required><br>
             @error('ImagChambre')
               <div id="ImagChambre_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div> 
  <!-- ************************************************************* -->
          <div class="form-group">
            <label for="nb_chambre">nombre de chambres :</label><br>
            <input type="number" id="nb_chambre" name="nb_chambre" placeholder="nombre de chambres" value="{{ old('nb_chambre') }}"  aria-describedby="nb_chambre_feedback" class="form-control @error('nb_chambre') is-invalid @enderror" required><br>
            @error('nb_chambre')
              <div id="nb_chambre_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
            <label for="NbreLits">nombre de lit par chambres :</label><br>
            <input type="number" id="NbreLits" name="NbreLits" placeholder="nombre de lit" value="{{ old('NbreLits') }}"  aria-describedby="NbreLits_feedback" class="form-control @error('NbreLits') is-invalid @enderror" required><br>
            @error('NbreLits')
              <div id="NbreLits_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
      
          <div class="form-group">
            <label for="Surface">Surface d'un chambre en m² :</label><br>
            <input type="number" id="Surface" name="Surface" placeholder="Surface" value="{{ old('Surface') }}"  aria-describedby="Surface_feedback" class="form-control @error('Surface') is-invalid @enderror" required><br>
            @error('Surface')
              <div id="Surface_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
            <label for="prix">prix d'un chambres :</label><br>
            <input type="number" id="prix" name="prix" placeholder="prix" value="{{ old('prix') }}"  aria-describedby="prix_feedback" class="form-control @error('prix') is-invalid @enderror" required><br>
            @error('prix')
              <div id="prix_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
          <label for="parking"> Parking</label>
            <input type="checkbox" id="parking" name="parking" value="parking" aria-describedby="parking_feedback" class="form-control @error('parking') is-invalid @enderror" >
            
            @error('parking')
                <div id="parking_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
          <label for="wifi">  Connexion Wi-Fi</label><br>
            <input type="checkbox" id="wifi" name="wifi" value="connexion wifi" aria-describedby="wifi_feedback" class="form-control @error('wifi') is-invalid @enderror" >
            
            @error('wifi')
                <div id="wifi_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
          <label for="salleSport">  Salle de sport</label><br>
            <input type="checkbox" id="salleSport" name="salleSport" value="salle de sport" aria-describedby="salleSport_feedback" class="form-control @error('salleSport') is-invalid @enderror" >
           
            @error('salleSport')
                <div id="salleSport_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
        
          
              <label class="checkbox" for="animalFriendly"> 
               Animaux domestiques admis :
              </label>
              <input class="input-checkbox" type="checkbox" id="animalFriendly" name="animalFriendly" value="animal friendly" aria-describedby="animalFriendly_feedback" class="form-control @error('animalFriendly') is-invalid @enderror" >   

               
            
           
         
           
            @error('animalFriendly')
                <div id="animalFriendly_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
          <label for="animalFriendly">  Fumeur admis</label>
            <input type="checkbox" id="Fumeur" name="Fumeur" value="Fumeur" aria-describedby="Fumeur_feedback" class="form-control @error('Fumeur') is-invalid @enderror">
            
            @error('Fumeur')
                <div id="Fumeur_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
  <!-- *************************************************************************************************************************************************** -->

    </div>

    
 
</div>
<div id="formulButton" class="partie2">  
<br><button  type="submit" onclick="addchambrehotel()" >Valider</button><br><br>
</form>
<div class="retours" ><script src="{{asset('js/retour.js')}}"></script></div>
</div>

 
@endsection