<?php
require_once 'conecta.php';

// Obtem os dados do formulário
$evento = $_POST['evento'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];

// Verifica se o arquivo foi enviado
if(!empty($imagem) && !empty($tamanho >0)){
    // Lê o conteúdo do arquivo 
    $fp = fopen($imagem,'rb');
    $conteudo = fread($fp, filesize($imagem));
    fclose($fp);

    // Protege contra problemas de caracteres no mysql
    $conteudo = mysqli_real_escape_string($conn, $conteudo);

    // Insere os dados no banco de dados
    $queryInsercao = "INSERT INTO tabela_imagens (evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem, imagem) 
                      VALUES ('$evento', '$descricao', '$nome', '$tamanho', '$tipo', '$conteudo')";
    $result = mysqli_query($conn, $queryInsercao);

    // Verifica se a inserção foi bem-sucedida
    if($result){
        echo "Imagem enviada com sucesso!";
        header("Location: index.php"); // Redireciona para a página principal após o envio
    } else {
        die ("Erro ao enviar imagem: " . mysqli_error($conn));
    }
} else {
    echo "Nenhum arquivo enviado ou o tamanho do arquivo é inválido.";
}
?>