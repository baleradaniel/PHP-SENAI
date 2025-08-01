<?php
require_once "conexao.php";

$conexao = conectadb();

$nome = "Daniel Balera";
$endereco = "Rua Francisco Batista, 163";
$telefone = "(47) 99679-1720";
$email = "danielbalera021@gmail.com";

//Preparando a consulta SQL para inserir os dados do cliente para evitar SQL Injection
$stmt = $conexao->prepare("INSERT INTO cliente (nome, endereco, telefone, email) VALUES (?, ?, ?, ?)");
//Associando os parâmetros à consulta preparada
$stmt -> bind_param("ssss", $nome, $endereco, $telefone, $email);

if ($stmt -> execute()) {
    echo"Cliente inserido com sucesso!";
} else {
    echo"Erro ao inserir cliente: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>