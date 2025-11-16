<?php
session_start();
require_once(__DIR__ . '/conexao.php'); // importa o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : '';

    if (empty($email) || empty($senha)) {
        header("Location: /login_moderno/index.html?erro=campos_vazios");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /login_moderno/index.html?erro=email_invalido");
        exit();
    }

    // Prepara a consulta para verificar se o email existe
    $sql = "SELECT id, senha FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        header("Location: /login_moderno/index.html?erro=server");
        exit();
    }

    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        error_log("Execute failed: " . $stmt->error);
        $stmt->close();
        $conn->close();
        header("Location: /login_moderno/index.html?erro=server");
        exit();
    }

    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $stmt->close();
        $conn->close();
        header("Location: /login_moderno/index.html?erro=credenciais_invalidas");
        exit();
    }

    $stmt->bind_result($id, $senha_hash);
    $stmt->fetch();

    // Verifica a senha
    if (!password_verify($senha, $senha_hash)) {
        $stmt->close();
        $conn->close();
        header("Location: /login_moderno/index.html?erro=credenciais_invalidas");
        exit();
    }
    
    $stmt->close();
    $conn->close();

    // Se a autenticação for bem-sucedida, redireciona para a página inicial (root do projeto)
    $_SESSION["user_id"] = $id;
    header("Location: /login_moderno/");
    exit();
} else {
    // Redireciona ao formulário de login em caso de método inválido
    header("Location: /login_moderno/index.html?erro=metodo_invalido");
    exit();
}
?>
