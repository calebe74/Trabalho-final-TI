<?php
@session_start();
include_once('../conexao.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: index.php?msg=Usuário excluído com sucesso");
        exit();
    } catch (PDOException $e) {
        header("Location: index.php?msg=Erro ao excluir usuário: " . $e->getMessage());
        exit();
    }

} else {
    header("Location: index.php?msg=ID do usuário inválido");
    exit();
}
?>
