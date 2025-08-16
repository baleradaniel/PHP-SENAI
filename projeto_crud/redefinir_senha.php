<?php
require_once 'includes/conexao.php';
$error = '';
$token = $_GET['token'] ?? null;

if (!$token) {
    die("Token inválido.");
}

// Verifica se o token é válido e não expirou
$sql = "SELECT id FROM usuarios WHERE token_recuperacao = :token AND data_token > NOW()";
$stmt = $conn->prepare($sql);
$stmt->execute(['token' => $token]);
$user = $stmt->fetch();

if (!$user) {
    die("Token inválido ou expirado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nova_senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nova_senha === $confirmar_senha) {
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        
        // Atualiza a senha e limpa o token
        $sql_update = "UPDATE usuarios SET senha = :senha, token_recuperacao = NULL, data_token = NULL WHERE id = :id";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->execute(['senha' => $senha_hash, 'id' => $user['id']]);

        header("Location: login.php?status=senha_redefinida");
        exit();
    } else {
        $error = "As senhas não coincidem.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Redefinir Senha</h2>
        <?php if ($error): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>
        <form method="post">
            <label for="senha">Nova Senha:</label>
            <input type="password" name="senha" required>
            <label for="confirmar_senha">Confirmar Nova Senha:</label>
            <input type="password" name="confirmar_senha" required>
            <button type="submit">Redefinir Senha</button>
        </form>
    </div>
</body>
</html>