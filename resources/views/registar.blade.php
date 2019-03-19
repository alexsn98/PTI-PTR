<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Registar Page</title>
</head>
<body class="mw-100 bg-info">
    <div id="registar" class="p-5 mx-auto bg-danger" style="width: 40%; margin-top:10%;">

        <form method="POST" action="/registar">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Palavra-passe">
            </div>
            <button type="submit" class="btn btn-primary">Registar</button>
        </form>
    </div>

</body>
</html>