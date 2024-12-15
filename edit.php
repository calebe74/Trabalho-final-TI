<?php
session_start();
require_once("conexao.php");

if (!isset($_GET['id'])) {
    echo "<script language='javascript'>window.alert('ID do usuário não especificado.');</script>";
    echo "<script language='javascript'>window.location='admin.php';</script>";
    exit();
}

// Recuperar o ID do usuário da URL
$id = $_GET['id'];

// Consultar o usuário com o ID especificado
$query = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Verificar se o usuário foi encontrado
if ($stmt->rowCount() == 0) {
    echo "<script language='javascript'>window.alert('Usuário não encontrado.');</script>";
    echo "<script language='javascript'>window.location='admin.php';</script>";
    exit();
}

// Recuperar os dados do usuário
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Editar Usuário</h2>
    <form action="editar.php?id=<?= $usuario['id'] ?>" method="post">
        <div class="form-group">
            <label for="usuario">Nome de Usuário:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario['usuario']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma nova senha (deixe em branco para manter a atual)">
        </div>

        <div class="form-group">
            <label for="confsenha">Confirmar senha:</label>
            <input type="password" class="form-control" id="confsenha" name="confsenha" placeholder="Digite novamente a senha">
        </div>

        <div class="form-group">
            <label for="ativo">Ativo:</label>
            <select class="form-control" id="ativo" name="ativo">
                <option value="Sim" <?= $usuario['ativo'] == 'Sim' ? 'selected' : '' ?>>Sim</option>
                <option value="Nao" <?= $usuario['ativo'] == 'Nao' ? 'selected' : '' ?>>Não</option>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

</body>
</html>
