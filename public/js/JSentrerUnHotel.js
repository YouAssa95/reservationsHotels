
i=0;
function addchambrehotel(){
  i++;
  $('.chambredispo').append('<div id="info'+i+'"></div>');

  fermer='<button class="btn btn-danger" class="addchambre"  onclick="deleteChambreHotel('+i+')">X</button><br><br>';
  imag_chambre='<input type="file" name="applicant.fileUpload" id="image_chambre" tabindex="0" accept=".png,.JFIF,.pdf"><br><br>';

  nb_chambre='<input type="number" id="nb_chambre" name="nb_chambre" placeholder="nombre de chambres"><br><br>';

  //typechambre='<input type="text" id="type_chambre" name="typechambre" placeholder="nombre de chambres"><br><br>';

  nb_de_lit='<input type="number" id="nb_de_lit" name="nb_de_lit" placeholder="nombre de lit"><br><br>';

  surface='<input type="number" id="surface" name="surface" placeholder="surface"><br><br>';

  prix='<input type="number" id="prix" name="prix" placeholder="prix"><br><br>';

  parking='<input type="checkbox" id="accessoire1" name="accessoire1" value="Parking"> <label for="vehicle1"> Parking</label><br>'

  wifi='<input type="checkbox" id="accessoire2" name="accessoire2" value="wifi"> <label for="vehicle1"> Connexion Wi-Fi</label><br>'

  sport='<input type="checkbox" id="accessoire3" name="accessoire3" value="salleSport"> <label for="vehicle1"> Salle de sport</label><br>'

  animaux='<input type="checkbox" id="accessoire4" name="accessoire4" value="Animaux"> <label for="vehicle1"> Animaux domestiques admis</label><br>'

  $('#info'+i).append(fermer);
  $('#info'+i).append(imag_chambre);
  $('#info'+i).append(nb_chambre);
  $('#info'+i).append(nb_de_lit);
  $('#info'+i).append(surface);
  $('#info'+i).append(prix);
  $('#info'+i).append(parking);
  $('#info'+i).append(wifi);
  $('#info'+i).append(sport);
  $('#info'+i).append(animaux);

  $('#info'+i).css({
    background: 'gainsboro',
    height: '480px',
    width: '250px',
    border: '3px solid rgb(126, 128, 18)',
    padding: '20px',
  });
  
}
function deleteChambreHotel (ii)
{
  
    $('#info'+ii).remove();
  
}