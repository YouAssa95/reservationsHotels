@extends('base')
@section('title', 'Réservation')
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Reservation form </title>
</head>

<body>
    
    <form method="POST" action="{{route('getPostPdf')}}">

        <label for="lastName"> Nom </label>
        <input type="text" id="lastName" name="lastName" value="{{session()->get('user')['lastName']}}"><br><br>

        <label for="firstName">Prénom</label>
        <input type="text" id="firstName" name="firstName" value="{{session()->get('user')['firstName']}}"><br><br>

        <label for="email">Adresse mail </label>
        <input type="email" id="email" name="email" value="{{session()->get('user')['email']}}"><br><br>


        <label for="phone">Tel</label>
        <input type="tel" id="phone" name="phone" placeholder="07 77 77 77 77" pattern="[0-9]{10}" ><br><br>

        <label for="email">Date d'arrivée </label>
        <input class="form-control" name="dateA" id="DateA" type="date" required />

        <label for="email">Date de départ </label>
        <input class="form-control" name="dateD" id="DateD" type="date" required/>

        <button class="RegisterButton">Valider la réservation</button>

    </form>

</body>

</html>

@endsection