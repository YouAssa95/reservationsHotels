<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <nav>
        <ul>
            <li id="logo">
                <a href="/"><img height="50px" src="/media/bookNow.png"></a>
            </li>

            
            <li id="AboutUs">
                <a href="/aboutUs">About us</a>
            </li>
            @if (session()->has('user'))
            <li id="Logout">
                <a href="/logout">Déconnexion</a>
            </li>
            <li id="MonCompte">
                <a href="/profil"> {{ session()->get('user')['lastName'] }}</a>
                <!-- <a href="">Profil</a> -->
            </li>
            @else
            <li id="MonCompte">
                <a href="/login">Mon compte</a>
            </li>
            @endif
            <li id="listHot">
                <a href="/hotels">Hôtels</a>
            </li>
        </ul>
    </nav>

</body>

</html>