<?php
require_once 'includes/conexao.php';

// Se não houver uma sessão de usuário ativa, redireciona para o login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        <p>Esta é a área administrativa do sistema.</p>
        <nav>
            <a href="usuarios/listar.php">Gerenciar Usuários</a> |
            <a href="logout.php">Sair</a>
        </nav>
    </div>
</body>
</html>