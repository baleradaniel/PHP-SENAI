<?php
// Definição das credenciais de conexão
$servername = "localhost";
$username = "root";
$password = "";
$database = "empresa";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificação da conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>