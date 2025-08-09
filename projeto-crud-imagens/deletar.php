<?php
include 'includes/conexao.php';
$id = $_GET['id'];
$conn->query("DELETE FROM funcionarios WHERE id = $id");
header("Location: ler.php");
exit;
?>
