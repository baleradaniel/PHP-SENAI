<?php
require_once '../includes/conexao.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'];

    // Validação
    if (!$nome || !$email || !$senha) {
        $error = 'Todos os campos são obrigatórios.';
    } else {
        // Verifica se o e-mail já existe
        $sql_check = "SELECT id FROM usuarios WHERE email = :email";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute(['email' => $email]);
        if ($stmt_check->fetch()) {
            $error = 'Este e-mail já está cadastrado.';
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $senha_hash])) {
                header("Location: listar.php");
                exit();
            } else {
                $error = 'Erro ao cadastrar usuário.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Novo Usuário</h2>
        <?php if ($error): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>
        <form action="cadastrar.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <label for="email">E-mail:</label>
            <input type="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="listar.php">Voltar</a>
    </div>
</body>
</html>