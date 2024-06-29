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

    // Query de seleção
    $sql = "SELECT nome, email, cpf, senha FROM usuarios WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Nenhum registro encontrado.";
        exit();
    }

    // Fechar a conexão
    $conexao->close();
} else {
    echo "ID do usuário não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="css/stytle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <form action="atualizar.php" method="POST">
        <div class="container">
            <div class="Form">
            <i class="fas fa-user-plus fa-2x" style="display: block; text-align: center; color: #007bff; margin-bottom: 10px;"></i>
                <h1 style="text-align: center;">Editar cadastro</h1>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" placeholder="Digite seu nome">
                <span id="nome-error" class="error-message"></span>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Digite seu email">
                <span id="email-error" class="error-message"></span>
                <label for="senha">Senha</label>
                <div class="password-container">
                    <input type="password" name="senha" id="senha" value="<?php echo $row['senha']; ?>" placeholder="Digite sua senha">
                    <i class="fa fa-eye toggle-password" onclick="togglePassword('senha')"></i>
                </div>
                <span id="senha-error" class="error-message"></span>
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" value="<?php echo $row['cpf']; ?>" placeholder="Digite seu CPF">
                <span id="cpf-error" class="error-message"></span>
                <input type="submit" value="Atualizar">
            </div>
        </div>
    </form>
    <script src="script/script.js"></script>
</body>
</html>
