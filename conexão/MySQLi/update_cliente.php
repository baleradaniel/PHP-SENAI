<?php
require_once "conexao.php";

$conexao = conectadb();

$nome = "Daniel de Magalhães Cabral Balera";
$endereco = "Rua Francisco Batista, 163";
$telefone = "(47) 99679-1720";
$email = "danielbalera021@gmail.com";

$id_cliente = 1;

$stmt = $conexao->prepare("UPDATE cliente SET nome = ?, endereco = ?, telefone = ?, email = ? WHERE id_cliente = ?");
$stmt->bind_param("ssssi", $nome, $endereco, $telefone, $email, $id_cliente);

if ($stmt->execute()) {
    echo"Cliente atualizado com sucesso!";
} else {
    echo"Erro ao atualizar cliente: " . $stmt->error;
}
$stmt->close();
$conexao->close();
?>