<?php
// Inclui os arquivos necessários
require_once 'includes/conexao.php'; // Já inicia a sessão
require_once 'includes/funcoes_email.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Valida e sanitiza o e-mail
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if ($email) {
        // 1. Verifica se o e-mail existe no banco de dados
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // 2. Gera uma nova senha temporária
            $senha_temporaria = gerarSenhaTemporaria();
            $senha_hash = password_hash($senha_temporaria, PASSWORD_DEFAULT);

            // 3. Atualiza a senha no banco de dados
            $sql_update = "UPDATE usuarios SET senha = :senha WHERE email = :email";
            $stmt_update = $conn->prepare($sql_update);
            
            if ($stmt_update->execute(['senha' => $senha_hash, 'email' => $email])) {
                // 4. Simula o envio do e-mail
                simularEnvioEmail($email, $senha_temporaria);
                
                // Define a mensagem de sucesso para ser exibida no HTML
                $message = "Uma nova senha foi enviada para o seu e-mail (simulação). Verifique o arquivo 'emails_simulados.txt' na raiz do projeto e <a href='login.php'>faça o login</a>.";
            } else {
                $error = "Ocorreu um erro ao tentar redefinir a senha. Tente novamente.";
            }

        } else {
            // Por segurança, exibe a mesma mensagem mesmo que o e-mail não seja encontrado
            $message = "Se o seu e-mail estiver em nosso sistema, uma nova senha foi enviada (simulação).";
        }
    } else {
        $error = "Por favor, insira um endereço de e-mail válido.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Recuperar Senha</h2>
        <p>Digite seu e-mail e enviaremos uma nova senha temporária para você.</p>
        
        <?php if ($message): ?>
            <p class="success"><?php echo $message; ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (!$message): // Esconde o formulário após o sucesso ?>
        <form action="esqueci_senha.php" method="post">
            <label for="email">Seu E-mail:</label>
            <input type="email" name="email" required>
            <button type="submit">Enviar Nova Senha</button>
        </form>
        <?php endif; ?>
        
        <br>
        <a href="login.php">Voltar para o Login</a>
    </div>
</body>
</html>