<?php
session_start();
require_once("conexao.php");

// Verifica se o usuário está logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: ../login.php");
}

if (isset($_POST['submit'])) {
    // Obtém os dados do formulário
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confsenha = $_POST['confsenha'];
    $ativo = $_POST['ativo'];

    // Verifica se as senhas coincidem
    if ($senha !== $confsenha) {
        echo "<script>alert('As senhas não coincidem!');</script>";
        echo "<script>window.location.href='painel/index.php';</script>";
        exit();
    }

    // Verifica se o email já está cadastrado
    $query = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Este e-mail já está cadastrado!');</script>";
        echo "<script>window.location.href='painel/index.php';</script>";
        exit();
    }

    // Não aplicar a criptografia, armazena a senha em texto simples
    // Inserir o novo usuário no banco de dados
    $query = "INSERT INTO usuarios (usuario, email, senha, ativo) VALUES (:usuario, :email, :senha, :ativo)";
    $stmt = $pdo->prepare($query);

    // Bind dos parâmetros
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha); // Armazenando a senha sem criptografia
    $stmt->bindParam(':ativo', $ativo);

    // Executa a query e verifica se foi bem-sucedido
    if ($stmt->execute()) {
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='painel/index.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar o usuário. Tente novamente mais tarde.');</script>";
        echo "<script>window.location.href='painel/index.php';</script>";
    }
}
?>
