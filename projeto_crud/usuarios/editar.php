<?php
require_once '../includes/conexao.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("ID inválido.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    // Adicione mais validações conforme necessário
    $sql = "UPDATE usuarios SET nome = :nome WHERE id = :id";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(['nome' => $nome, 'id' => $id])) {
        header("Location: listar.php");
        exit();
    }
}

$sql = "SELECT nome, email FROM usuarios WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Usuário não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Editar Usuário</h2>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
            <label for="email">E-mail (não editável):</label>
            <input type="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" disabled>
            <button type="submit">Salvar Alterações</button>
        </form>
        <a href="listar.php">Voltar</a>
    </div>
</body>
</html>