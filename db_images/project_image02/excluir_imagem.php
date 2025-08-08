<?php
require('conecta.php');

$id_imagem = isset($_POST['id']) ? $_POST['id'] : 0;

if ($id_imagem > 0) {
    // Prepara a consulta para excluir a imagem
    $queryExcluir = "DELETE FROM tabela_imagens WHERE codigo = ?";
    
    // Prepara a declaração
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i", $id_imagem);
    
    // Executa a declaração
    if ($stmt->execute()) {
        echo "Imagem excluída com sucesso!";
    } else {
        die("Erro ao excluir imagem: ". $stmt->error);
    }
    
    // Fecha a declaração
    $stmt->close();
} else {
    echo "ID inválido.";
}

header("Location: index.php");
exit();





?>