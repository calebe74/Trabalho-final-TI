<?php
@session_start();
require_once("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$res = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
$res->bindValue(":email", $email);
$res->bindValue(":senha", $senha);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if ($linhas > 0) {
    $_SESSION['nome_user'] = $dados[0]['usuario'];
    $_SESSION['email'] = $dados[0]['email'];
    $_SESSION['senha_user'] = $dados[0]['senha'];
    $_SESSION['acesso_user'] = $dados[0]['ativo'];

    if ($_SESSION['acesso_user'] == "Sim") {
        echo "<script language='javascript'>window.location='painel/index.php';</script>";
        exit();
    }

    if ($_SESSION['acesso_user'] == "Não") {
        echo "<script language='javascript'>window.location='paineluser/index.php';</script>";
        exit();
    }
} else {
    // Exibe o alerta de dados incorretos caso nenhum usuário seja encontrado
    echo "<script language='javascript'>window.alert('DADOS INCORRETOS!!');</script>";
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit();
}
?>
