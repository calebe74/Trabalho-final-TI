<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom Styles -->
    <style>
    </style>
</head>
<body>
<a href="index.php" class="back-button">Voltar</a>
    <div class="form-container">
        <h1>Login</h1>
        <form action="autenticar.php" method="post">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>
