<?php
// conexão bd
include_once('conexao.php');

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Query de atualização
    $sql = "UPDATE usuarios SET nome='$nome', email='$email', cpf='$cpf', senha='$senha' WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o usuário: " . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();

    // Redirecionar de volta para a página de exibição
    header('Location: exibir.php');
} else {
    echo "Método de requisição inválido.";
}
?>
