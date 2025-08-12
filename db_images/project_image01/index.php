<?php
// Incluir o arquivo de conexão
require_once 'conecta.php';

// Cria a consulta SQL para selecionar os dados principais (sem a coluna de imagem)
$querySelecao = "SELECT codigo, evento, descricao, nome_imagem, tamanho_imagem FROM tabela_imagens";

$result = mysqli_query($conn, $querySelecao);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armazenamento de Imagens no BD MySQL</title>
</head>
<body>
    <h2>Selecione um novo arquivo de imagem</h2>
    <form action="upload.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="999999999">

        <input type="text" name="evento" placeholder="Nome do Evento" >

        <input type="text" name="descricao" placeholder="Descrição do Evento">

        <input type="file" name="imagem">

        <input type="submit" value="Enviar Imagem">
    </form>

    <table border="1">
    <tr>
        <td align="center">Código</td>
        <td align="center">Evento</td>
        <td align="center">Descrição</td>
        <td align="center">Nome da Imagem</td>
        <td align="center">Tamanho</td>
        <td align="center">Vizualizar Imagem</td>
        <td align="center">Excluir Imagem</td>
    </tr>
    <?php
    while ($arquivos = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td align="center"><?php echo $arquivos['codigo']; ?></td>
                <td align="center"><?php echo $arquivos['evento']; ?></td>
                <td align="center"><?php echo $arquivos['descricao']; ?></td>
                <td align="center"><?php echo $arquivos['nome_imagem']; ?></td>
                <td align="center"><?php echo $arquivos['tamanho_imagem']; ?> bytes</td>
                <td align="center">
                    <a href="ver_imagens.php?id=<?php echo $arquivos['codigo'];?>">Vizualizar</a>
                    <td align="center">
                        <a href="excluir_imagem.php?codigo=<?php echo $arquivos['codigo']; ?>">Excluir</a>
                    </td>
                </tr>
        <?php    } ?>
        </table>
</body>
</html>