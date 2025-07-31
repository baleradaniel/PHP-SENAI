<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa_teste";

// Conexão usando MySQLi sem proteção contra SQL Injection
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
// Captura os dados do formulário (nome de usuario)
$nome = $_POST["nome"];

//Executa a consulta SEM proteção contra SQL Injection
$sql = "SELECT * FROM cliente_teste WHERE nome = '$nome'";
$result= $conexao->query($sql);
// se houver resultado, o login foi bem-sucedido
if ($result->num_rows > 0) {
    header("Location: area_restrita.php");
//Garante que o código para aqui para evitar execução indevida
    exit();
} else {
    echo "Nome de usuário ou senha inválidos.";
}
$conexao->close();
?>