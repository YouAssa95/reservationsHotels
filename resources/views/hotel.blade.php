@extends('base')

@section('title')
{{$hotel['NomHotel']}}
@endsection
@section('content')
<!doctype html>
<html>

<head>
   <h1> Hotel </h1>
</head>

<body>

<table class="table table-striped">
    <tbody>
        <tr>
            <td>Nom </td>
            <td>{{ $hotel['NomHotel'] }} </td>
        </tr>
        <tr>
            <td>email</td>
            <td>{{ $hotel['emailHotel'] }}</td>
        </tr>
        <tr>
            <td>Adresse </td>
            <td>{{ $hotel['AdresseHotel'] }}</td>
        </tr>
        <tr>
            <td>CP</td>
            <td>{{ $hotel['cpHotel'] }}</td>
        </tr>
        <tr>
            <td>ville</td>
            <td>{{ $hotel['villeHotel'] }}</td>
        </tr>
        <tr>
            <td>classe </td>
            <td>{{ $hotel['classeHotel'] }}</td>
        </tr>
    </tbody>
</table>
</body>

</html>
@endsection