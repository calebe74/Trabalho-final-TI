<?php

$host = 'localhost'; 
$dbname = 'biblioteca';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:dbname=$dbname;host=$host;charset=utf8", "$username", "$password");
} catch (Exception $e) {
    echo 'Erro ao conectar no banco de dados: <br>';
    echo $e;
    exit; // Encerra o script em caso de erro
}


?>
