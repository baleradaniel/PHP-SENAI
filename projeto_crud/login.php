<?php
// Adicione estas duas linhas para depuração
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'includes/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    echo "Tentando logar com o email: " . htmlspecialchars($email) . "<br>"; // Ponto de verificação 1

    // Busca o usuário no banco de dados pelo e-mail
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // var_dump() é a melhor ferramenta para depurar
    echo "<pre>";
    var_dump($user); // Ponto de verificação 2
    echo "</pre>";

    // Verifica se o usuário existe e se a senha está correta
    if ($user) { // Primeiro, checa se o usuário foi encontrado
        echo "Usuário encontrado! Verificando a senha...<br>"; // Ponto de verificação 3

        if (password_verify($senha, $user['senha'])) {
            echo "Senha CORRETA! Redirecionando..."; // Ponto de verificação 4 - Se você vir isso, o problema é a sessão.

            // Credenciais corretas: armazena os dados na sessão
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            
            // Garante que a sessão foi gravada antes de redirecionar
            session_write_close(); 

            header("Location: index.php"); // Redireciona para a página principal
            exit(); // SEMPRE use exit() após um redirecionamento
        } else {
            $error = 'Senha inválida!';
            echo $error; // Ponto de verificação 5
        }
    } else {
        $error = 'E-mail não encontrado!';
        echo $error; // Ponto de verificação 6
    }
    die(); // Interrompe o script para podermos ver as mensagens de echo/var_dump
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="esqueci_senha.php">Esqueci a Senha</a>
    </div>
</body>
</html>