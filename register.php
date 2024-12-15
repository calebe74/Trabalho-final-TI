<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

    <a href="index.php" class="back-button">Voltar</a>

    <div class="form-container">
        <h1>Cadastro</h1>
        <form action="adicionar.php" method="post">
            <div class="form-group">
                <label for="usuario">Nome de Usuário:</label>
                <input type="text" class="form-control" id="username" name="usuario" placeholder="Digite seu nome de usuário" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="password" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="form-group">
                <label for="confsenha">Confirmar senha:</label>
                <input type="password" class="form-control" id="confsenha" name="confsenha" placeholder="Digite sua senha novamente" required>
            </div>

            <button type="submit" name="submit">Cadastrar</button>
        </form>
    </div>
    
</body>
</html>
