@extends('base')

@section('title')
Hôtels
@endsection
@section('content')
<!doctype html>
<html>

<head>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <link rel="stylesheet" href="{{ asset('css/advancedHotel.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            @foreach ($hotels as $row)
            <div class="col-md-4 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2"> <a href="#"> <img class="pic-1" src='media/proposition3.jpg'> <img class="pic-2" src='media/proposition1.jpg'> </a>
                        <ul class="social">
                            <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="{{route('hotels.show', ['NumHotel'=>$row['NumHotel']])}}"> {{$row['NomHotel']}}</a></h3> <span class="price">30</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <hr>
</body>

</html>
@endsection