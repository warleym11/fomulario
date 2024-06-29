<?php

// conexão bd
include_once('conexao.php');

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Query de inserção
    $sql = "INSERT INTO usuarios (nome, email, senha, cpf) VALUES ('$nome', '$email', '$senha', '$cpf')";

    if ($conexao->query($sql) === TRUE) {
      header('Location: login.php');
    } else {
        echo "Erro ao inserir registro: " . $sql . "<br>" . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
}
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="css/stytle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<form action="index.php" method="POST">
        <div class="container">
            <div class="Form">
                <i class="fas fa-user-plus fa-2x" style="display: block; text-align: center; color: #007bff; margin-bottom: 10px;"></i>
                <h1 style="text-align: center;">Cadastro</h1>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
                <span id="nome-error" class="error-message"></span>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Digite seu email">
                <span id="email-error" class="error-message"></span>
                <label for="senha">Senha</label>
                <div class="password-container">
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                    <i class="fa fa-eye toggle-password" onclick="togglePassword('senha')"></i>
                </div>
                <span id="senha-error" class="error-message"></span>
                <label for="confirmaSenha">Confirmar senha</label>
                <div class="password-container">
                    <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Digite sua senha novamente">
                    <i class="fa fa-eye toggle-password" onclick="togglePassword('confirmaSenha')"></i>
                </div>
                <span id="confirma-senha-error" class="error-message"></span>
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF">
                <span id="cpf-error" class="error-message"></span>
                <input type="submit" value="Enviar">
                <p class="register-link">Já tem uma conta? <a href="login.php">Login</a></p>
            </div>
        </div>
    </form>

    <script src="script/script.js"></script>
</body>
</html>
