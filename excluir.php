<?php
// conexão bd
include_once('conexao.php');

// Verificar se o ID foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Query de exclusão
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir o usuário: " . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();

    // Redirecionar de volta para a página de exibição
    header('Location: exibir.php');
} else {
    echo "ID do usuário não fornecido.";
}
?>
