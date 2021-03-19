   
    @extends('base')
    @section('title', 'add chambre')

@section('content')
<body onload="hideformulaire()">
<script src="{{asset('js/addChambre.js')}}"></script>


 <bouton id="buttonAddChambre"  onclick="addchambrehotel()">ajouter autres types de chambres</bouton>

<form  method="POST" action="{{route('registerUneChambre.post')}}" >
    
    


   
     
        <!-- ************************************************************* -->
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
            <input type="checkbox" id="parking" name="parking" value="parking" aria-describedby="parking_feedback" class="form-control @error('parking') is-invalid @enderror" >
            <label for="parking"> Parking</label><br>
            @error('parking')
                <div id="parking_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
            <input type="checkbox" id="wifi" name="wifi" value="connexion wifi" aria-describedby="wifi_feedback" class="form-control @error('wifi') is-invalid @enderror" >
            <label for="wifi">  Connexion Wi-Fi</label><br>
            @error('wifi')
                <div id="wifi_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
            <input type="checkbox" id="salleSport" name="salleSport" value="salle de sport" aria-describedby="salleSport_feedback" class="form-control @error('salleSport') is-invalid @enderror" >
            <label for="salleSport">  Salle de sport</label><br>
            @error('salleSport')
                <div id="salleSport_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
            <input type="checkbox" id="animalFriendly" name="animalFriendly" value="animal friendly" aria-describedby="animalFriendly_feedback" class="form-control @error('animalFriendly') is-invalid @enderror" >
            <label for="animalFriendly">  Animaux domestiques admis</label><br>
            @error('animalFriendly')
                <div id="animalFriendly_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
  <!-- ************************************************************* -->
          <div class="form-group">
            <input type="checkbox" id="Fumeur" name="Fumeur" value="Fumeur" aria-describedby="Fumeur_feedback" class="form-control @error('Fumeur') is-invalid @enderror">
            <label for="animalFriendly">  Fumeur admis</label><br>
            @error('Fumeur')
                <div id="Fumeur_feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
  <!-- ************************************************************* -->

    <button type="submit" >Valider</button><br><br>
  </form>
  <div class="retours" ><script src="{{asset('js/retour.js')}}"></script></div>

  </body>
  @endsection