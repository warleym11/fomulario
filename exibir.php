<?php
// conexão bd
include_once('conexao.php');

// Verificar a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Query de seleção
$sql = "SELECT id, nome, email, cpf, senha FROM usuarios";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Dados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Lista de Usuários</h1>
        <table border="1" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Senha</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output de cada linha
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["nome"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["cpf"] . "</td>
                                <td>" . $row["senha"] . "</td>
                                <td>
                                    <a href='editar.php?id=" . $row["id"] . "'>Editar</a> | 
                                    <a href='excluir.php?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align: center;'>Nenhum registro encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Fechar a conexão
$conexao->close();
?>
