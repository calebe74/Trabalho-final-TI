<?php
session_start();
require_once("../conexao.php");

if (!isset($_GET['id'])) {
    echo "<script language='javascript'>window.alert('ID do usuário não especificado.');</script>";
    echo "<script language='javascript'>window.location='index.php';</script>";
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
    echo "<script language='javascript'>window.location='index.php';</script>";
    exit();
}

// Recuperar os dados do usuário
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar e processar os dados do formulário
    $usuarioAtualizado = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $emailAtualizado = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senhaAtualizada = $_POST['senha'];
    $ativo = $_POST['ativo'];

    // Se a senha foi modificada, validamos se ela confere com a confirmação
    if (!empty($senhaAtualizada)) {
        if ($senhaAtualizada !== $_POST['confsenha']) {
            echo "<script language='javascript'>window.alert('As senhas não coincidem.');</script>";
            echo "<script language='javascript'>window.location='index.php';</script>";
            exit();
        }
        // Não estamos mais utilizando criptografia, então a senha vai direto assim
        $senhaAtualizada = $senhaAtualizada;
        $sql = "UPDATE usuarios SET usuario = :usuario, email = :email, senha = :senha, ativo = :ativo WHERE id = :id";
    } else {
        // Não atualizar a senha se não houver alteração
        $sql = "UPDATE usuarios SET usuario = :usuario, email = :email, ativo = :ativo WHERE id = :id";
    }

    // Preparar e executar a query
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuarioAtualizado);
    $stmt->bindParam(':email', $emailAtualizado);
    if (!empty($senhaAtualizada)) {
        $stmt->bindParam(':senha', $senhaAtualizada);
    }
    $stmt->bindParam(':ativo', $ativo);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirecionar após salvar as alterações
    header("Location: index.php");
    exit();
}
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
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        </div>
        <div class="form-group">
            <label for="senha">Nova Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <div class="form-group">
            <label for="confsenha">Confirmar Nova Senha:</label>
            <input type="password" class="form-control" id="confsenha" name="confsenha">
        </div>
        <div class="form-group">
            <label for="ativo">Status:</label>
            <select class="form-control" id="ativo" name="ativo" required>
                <option value="Sim" <?= $usuario['ativo'] == 'Sim' ? 'selected' : '' ?>>Ativo</option>
                <option value="Não" <?= $usuario['ativo'] == 'Não' ? 'selected' : '' ?>>Inativo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
