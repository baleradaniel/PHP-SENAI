<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
ob_clean(); //LIMPA QUALQUER SAIDA INESPERADA ANTES DO HEADER

//INCLUI A CONEXÃO COM O BANCO DE DADOS
require('conecta.php');

//OBTEM O ID DA IMAGEM DA URL, GARANTINDO QUE SEJA UM NÚMERO
$id_imagem = isset($_POST['id']) ? $_POST[''] :'';

//CRIA A CONSULTA PARA BUSCAR A IMAGEM NO BANCO

$querySelecionaPorCodigo = "SELECT imagem, tipo_imagem  FROM tabela_imagens WHERE codigo = ?";

//CRIA A SEGURANÇA UTILIZANDO statement PARA MELHOR SEGURANÇA
$stmt = $conexao->prepare($querySelecionaPorCodigo);
$stmt->bind_param("i", $id_imagem);
$stmt->execute();
$resultado = $stmt->get_result();

//VERIFICA SE A IMAGEM EXISTE NO BANCO
if($resultado->num_rows > 0){
    $imagem = $resultado->fetch_object();

$tipoImagem = !empty($imagem->tipoImagem) ? $imagem->tipoImagem :"image/jpeg";
header("Content-type: $tipoImagem");
echo $imagem->Imagem;
}else{
    echo "Imagem não encontrada.";
}
$stmt ->close();
?>