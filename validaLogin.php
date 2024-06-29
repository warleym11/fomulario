<?php
session_start();

// Conexão com o banco de dados
include_once('conexao.php');

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Recupera os dados do formulário
$email = $_POST['email'];
$password = $_POST['senha'];

// Consulta SQL para verificar as credenciais
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido
    $_SESSION['logged_in'] = true;
    // Adiciona uma variável de sessão para indicar o sucesso do login
    $_SESSION['login_success'] = true;
    header('location: home.php');
} else {
    // Login falhou    
    header('location: login.php?error=invalid');
}

$conexao->close();
?>