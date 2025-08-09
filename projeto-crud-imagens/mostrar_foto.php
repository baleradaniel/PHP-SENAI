<?php
include 'includes/conexao.php';
$id = $_GET['id'];
$sql = "SELECT foto FROM funcionarios WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

header("Content-Type: image/jpeg");
echo $row['foto'];
?>
