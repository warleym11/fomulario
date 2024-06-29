<?php
    // Conectar ao banco de dados (substitua essas informações pelas suas)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario";

    $conexao = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

?>