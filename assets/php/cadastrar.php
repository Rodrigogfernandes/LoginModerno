<?php

require_once(__DIR__ . '/conexao.php'); // importa o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    // Verifica se o email já está cadastrado
    if (empty($nome) || empty($email) || empty($senha)) {
        header("Location: /login_moderno/login.html?erro=campos_vazios");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /login_moderno/login.html?erro=email_invalido");
        exit();
    }
    
    if (strlen($senha) < 6) {
        header("Location: /login_moderno/login.html?erro=senha_curta");
        exit();
    }

    // Prepara a consulta para verificar se o email já existe

    $sql_check = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        $conn->close();
        header("Location: /login_moderno/login.html?erro=email_existente");
        exit();
    }
    $stmt->close();

    // gerar hash segura para a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    //inserir novo usuário no banco de dados 

    $sql = "INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: /login_moderno/login.html?sucesso=cadastro_realizado");
        exit();
    } else {
        $stmt->close();
        $conn->close();
        header("Location: /login_moderno/login.html?erro=erro_cadastro");
        exit();
    }
} else {
    echo "Método de requisição inválido.";
}
?>

