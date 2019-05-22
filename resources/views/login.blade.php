<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/loginPage.css') }}>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Login Page</title>
</head>
<body class="mw-100">
    <div id="login" class="p-5 mx-auto bg-light">
        <img src={{ asset('img/logo.png') }}>
        <form method="POST" action="/">
            @csrf
            
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Palavra-passe">
            </div>
            <div class="form-group">
                <input type="checkbox" name="rememberMe" value="rememberMe">Lembrar-me<br>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <hr style="height: 1px; border:0; width: 100%; color:#333;background-color:#0C4DA2; margin-top: 20px; margin-bottom: 6px;">
        <a href="home/visitante" style="color: #0C4DA2; font-size:12px;margin-top:1%;">Entrar como visitante</a>
        <br>
        @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</body>
</html>