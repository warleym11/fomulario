<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login</title>
    <link rel="stylesheet" href="css/stytle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <form action="validaLogin.php" method="POST">
    <div class="container">
        <div class="Form">
            <i class="fas fa-user-plus fa-2x" style="display: block; text-align: center; color: #007bff; margin-bottom: 10px;"></i>
            <h1 style="text-align: center;">Login</h1>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Digite seu email">
            <span id="email-error" class="error-message-login"></span>
            <label for="senha">Senha</label>
            <div class="password-container">
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                <i class="fa fa-eye toggle-password" onclick="togglePassword('senha')"></i>
            </div>
            <span id="senha-error" class="error-message-login"></span>
            <input type="submit" value="Enviar" onclick="validateForm()">
            <p class="register-link">Não tem uma conta? <a href="index.php">Registre-se</a></p>
        </div>
    </div>
            <?php
                if(isset($_GET['error']) && $_GET['error'] == 'invalid') {
                    echo "<p style='color: red;'>Login ou senha inválidos.</p>";
                }
            ?>

    </form>

    <script src="script/script.js"></script>
</body>
</html>
