<?php
//habilita o relatório de erros
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function conectadb(){
    $endereco = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "empresa";

    try {
        $con = new mysqli($endereco, $usuario, $senha, $banco);
        //Definição do conjunto de caracteres para evitar problemas com acentuação
        $con->set_charset("utf8mb4"); 
        //Retorna o objeto de conexão
        return $con;
    } catch (Exception $e) {
        //Exibe mensagem de erro caso a conexão falhe
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
}
?>