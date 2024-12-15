<?php
session_start();
require_once("conexao.php");

if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];
        
       
        if ($senha != $confsenha) {
            echo "<script language='javascript'>window.alert('As senhas não coincidem!');</script>";
            echo "<script language='javascript'>window.location='register.php';</script>";
            exit();
        }
        
        $email = $_POST['email'];
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "<script language='javascript'>window.alert('Este e-mail já está cadastrado!');</script>";
            echo "<script language='javascript'>window.location='register.php';</script>";
            exit();
        }
        
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha']; 
        $ativo = 'Não'; 

        $query = "INSERT INTO usuarios (usuario, email, senha, ativo) VALUES (:usuario, :email, :senha, :ativo)";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':ativo', $ativo);

        if ($stmt->execute()) {
            echo "<script language='javascript'>window.location='cadastrofeito.php';</script>";
            exit();
        } else {
            echo "<script language='javascript'>window.alert('Erro ao cadastrar usuário. Tente novamente mais tarde.');</script>";
            echo "<script language='javascript'>window.location='register.php';</script>";
            exit();
        }
    }
}
?>
