<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/home.css') }}>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    @yield('cssPage')
    <title>Home Page</title>
</head>
<body>
    <header>
        <div id="logo">
            <img src={{ asset('img/logo.png') }}>
        </div>
        <div id="divLogout">
            <div id="space">
            </div>
            <div id="nameUser">
                <h3>Utilizador:</h3>
                <h5>fc{{request()->session()->get('userNum')}}</h5>
            </div>
            <div id="logoutDiv">
                <a id="linkLogout" href="/logout">
                    <div id="logout">
                        <p> Logout </p>
                    </div>
                </a>
            </div>
        </div>
    </header>
    <div>
        @yield('content')
    </div>
</body>
</html>