<?php
require_once '../includes/conexao.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    // Evita que o usuário logado se auto-exclua
    if ($id == $_SESSION['user_id']) {
        header("Location: listar.php?error=self_delete");
        exit();
    }
    
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
}

header("Location: listar.php");
exit();
?>