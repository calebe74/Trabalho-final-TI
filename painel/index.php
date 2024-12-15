<?php
@session_start();
include_once('../conexao.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: ../login.php");
}
$logado = $_SESSION['email'];

$sql = "SELECT * FROM usuarios ORDER BY id ASC";
$result = $pdo->query($sql);

if ($result) {
    $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    $usuarios = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark text-white">

<header class="header p-3 d-flex justify-content-between align-items-center bg-secondary shadow">
    <h1 class="text-warning text-center m-0">ADMINISTRAÇÃO</h1>
    <div class="d-flex gap-3 align-items-center">
    <button class="btn btn-info btn-sm w-auto px-3" data-bs-toggle="modal" data-bs-target="#addUserModal" style="background-color: #d4af37; border-color: #d4af37;">Novo Usuário</button>

        <a href="../logout.php" class="btn btn-warning btn-sm" style="background-color: #d4af37; border-color: #d4af37;">Sair</a>
    </div>
</header>

<div class="container my-5">
    <h2 class="text-center mb-4">Usuários Cadastrados</h2>
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Nome</th>
                <th scope="col">Ativo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario['id']) ?></td>
                <td><?= htmlspecialchars($usuario['email']) ?></td>
                <td><?= htmlspecialchars($usuario['usuario']) ?></td>
                <td><?= htmlspecialchars($usuario['ativo']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario['id'] ?>" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <a href="excluir.php?id=<?= $usuario['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
    <i class="bi bi-trash"></i> Excluir
</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!-- Modal Adicionar Usuário -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Adicionar Novo Usuário</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../adcadm.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomeUsuario" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="nomeUsuario" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailUsuario" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailUsuario" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senhaUsuario" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senhaUsuario" name="senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="confSenhaUsuario" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confSenhaUsuario" name="confsenha" required>
                    </div>
                    <div class="mb-3">
                        <label for="ativoUsuario" class="form-label">Ativo</label>
                        <select class="form-select" id="ativoUsuario" name="ativo" required>
                            <option value="Nao">Não</option>
                            <option value="Sim">Sim</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
