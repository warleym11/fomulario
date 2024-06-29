// Função para validar o formulário de cadastro
function validateForm() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmaSenha = document.getElementById('confirmaSenha').value;
    const cpf = document.getElementById('cpf').value;
    
    let isValid = true;

    // Limpar mensagens de erro
    document.getElementById('nome-error').style.display = 'none';
    document.getElementById('email-error').style.display = 'none';
    document.getElementById('senha-error').style.display = 'none';
    document.getElementById('confirma-senha-error').style.display = 'none';
    document.getElementById('cpf-error').style.display = 'none';

    // Verificar se os campos estão vazios
    if (!nome) {
        document.getElementById('nome-error').innerText = 'O nome é obrigatório';
        document.getElementById('nome-error').style.display = 'block';
        isValid = false;
    }

    // Verificar o formato do email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
        document.getElementById('email-error').innerText = 'O email é obrigatório';
        document.getElementById('email-error').style.display = 'block';
        isValid = false;
    } else if (!emailRegex.test(email)) {
        document.getElementById('email-error').innerText = 'O email não é válido';
        document.getElementById('email-error').style.display = 'block';
        isValid = false;
    }

    // Verificar se a senha atende aos critérios
    const senhaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!senha) {
        document.getElementById('senha-error').innerText = 'A senha é obrigatória';
        document.getElementById('senha-error').style.display = 'block';
        isValid = false;
    } else if (!senhaRegex.test(senha)) {
        document.getElementById('senha-error').innerText = 'A senha deve ter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas, números e símbolos';
        document.getElementById('senha-error').style.display = 'block';
        isValid = false;
    } else if (senha !== confirmaSenha) {
        document.getElementById('confirma-senha-error').innerText = 'As senhas não coincidem';
        document.getElementById('confirma-senha-error').style.display = 'block';
        isValid = false;
    }

    // Verificar se o CPF é válido
    if (!cpf) {
        document.getElementById('cpf-error').innerText = 'O CPF é obrigatório';
        document.getElementById('cpf-error').style.display = 'block';
        isValid = false;
    } else if (!isValidCPF(cpf)) {
        document.getElementById('cpf-error').innerText = 'O CPF não é válido';
        document.getElementById('cpf-error').style.display = 'block';
        isValid = false;
    }

    // Se todos os campos forem válidos, redirecionar para a página de login
    if (isValid) {
        window.location.href = 'login.html';
    }
}

// Função para verificar se o CPF é válido
function isValidCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g,'');
    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;
    let soma = 0, resto;
    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;
    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i-1, i)) * (12 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    return resto === parseInt(cpf.substring(10, 11));
}

// Função para alternar a visibilidade da senha
function togglePassword(id) {
    const passwordInput = document.getElementById(id);
    const toggleIcon = passwordInput.nextElementSibling;
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.add('active');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('active');
    }
}
