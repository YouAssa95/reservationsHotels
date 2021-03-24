<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ma page</title>
</head>
<body>
<h1>Résumé de votre réservation</h1><br><br>

<div>Bonjour, {{$obj->nom}} {{$obj->prenom}}</div>
<div>Votre réservation n°B2D1925223 est confirmée.<br><br>
Veuillez présenter ce ticket de réservation, ainsi que votre carte d'identité à l'accueil de l'hôtel, 
afin de procéder au payement de votre chambre et d'y avoir accès.<br><br>
Veuillez trouver ci-dessous le détail de votre réservation :</div><br><br>

<div>--------------------------------------------------------------------------------------------------------------------------------------</div>

<h3>Vos coordonnées :</h3>
<div>Nom : {{$obj->nom}}</div>
<div>Prenom : {{$obj->prenom}}</div>
<div>Votre adresse mail : {{$obj->mail}}</div>
<div>Votre numéro de téléphone : {{$obj->tel}}</div><br><br>

<div>--------------------------------------------------------------------------------------------------------------------------------------</div>

<h3>Votre séjour :<h3>
<p> Hôtel : {{$obj->Hotel}} </p>
<p> adresse : {{$obj->adresse}}, {{$obj->destination}} ({{$obj->cpHotel}}) </p>

<p>date d'arrivée : {{$obj->arrive}}</p>
<p>date de départ :  {{$obj->depart}}</p>
<p>chambre numéro : {{$obj->NumChambre}} </p>
<p> prix/nuit :  {{$obj->prix}} &#8364; </p>


<!-- Saut de page 
<div style="page-break-after: always;" ></div>-->

</body>
</html>

<style>

h1 {
    color: #b48608; 
    font-family: 'Droid serif', 
    serif; font-size: 36px; 
    font-weight: 400; 
    font-style: italic; 
    line-height: 44px; 
    margin: 0 0 12px; 
    text-align: center;
    
}

h3 {
    color: #b48608; 
    font-family: 'Droid serif', 
    serif; font-size: 36px; 
    font-weight: 400; 
    font-style: italic; 
    line-height: 44px; 
    margin: 0 0 12px; 
    text-align: center;
    
}
</style>