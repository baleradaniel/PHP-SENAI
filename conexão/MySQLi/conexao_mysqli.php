<?php
// Conexão com o banco de dados MySQL usando MySQLi
$nomeservidor = 'localhost';
$usuario = "root";
$senha = "";
$bancodedados = "empresa";

// Criando a conexão
$conn = mysqli_connect("$nomeservidor", "$usuario", "$senha", "$bancodedados");

//Verificando a conexão
if (!$conn) { //Caso a conexão falhe, interrompe o script e exibe a mensagem de erro
    die("Conexão falhou: " . mysqli_connect_error());
}
//Configuração do conjunto de caracteres para evitar problemas com acentuação
mysqli_set_charset($conn, "utf8mb4");
echo "Conexão bem-sucedida!<br>";

$sql = "SELECT id_cliente, nome, email FROM cliente";
$result = mysqli_query($conn, $sql);

// Verificando se a consulta retornou resultados
if (mysqli_num_rows($result) > 0) {
    //Itera sobre os resultados e exibe os dados
    while ($linha = mysqli_fetch_assoc($result)) {
        echo "ID: " . $linha["id_cliente"] . " - Nome: " . $linha["nome"] . " - Email: " . $linha["email"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

mysqli_close($conn);
?>