<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ma page</title>
</head>
<body>
<h1>Résumé de votre réservation</h1>

<div>Bonjour {{$obj->nom}} {{$obj->prenom}}</div>
<div>Votre réservation n°B2D1925223 est confirmée. 
Veuillez trouver ci-dessous le détail de votre réservation :</div>

<div>-------------------------------------------------------------</div>

<div>Vos coordonnées :</div>
<div>{{$obj->nom}}</div>
<div>{{$obj->prenom}}</div>
<div>{{$obj->mail}}</div>
<div>{{$obj->tel}}</div>

<div>-------------------------------------------------------------</div>

<div>Votre séjour :</div>
<div>{{$obj->nom}}</div>
<div>{{$obj->prenom}}</div>
<div>{{$obj->mail}}</div>
<div>{{$obj->tel}}</div>

<!-- Saut de page 
<div style="page-break-after: always;" ></div>-->

</body>
</html>

<style>

</style>