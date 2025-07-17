<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedor</title>
</head>

<body>
    <?php
    if (isset($_GET['nome_fornecedor']) && isset($_GET['email_fornecedor']) && isset($_GET['telefone_fornecedor']) && isset($_GET['cnpj_fornecedor']) && isset($_GET['endereco_fornecedor']) && isset($_GET['cidade_fornecedor']) && isset($_GET['estado_fornecedor'])) {
        echo "Fornecedor cadastrado com sucesso!<br/>". "<br/>";
        echo "Nome: " . $_GET['nome_fornecedor']. "<br/>";
        echo "CNPJ: " . $_GET['cnpj_fornecedor']. "<br/>";
        echo "Endereço: " . $_GET['endereco_fornecedor']. "<br/>";
        echo "Cidade: " . $_GET['cidade_fornecedor']. "<br/>";
        echo "Estado: " . $_GET['estado_fornecedor']. "<br/>";
        echo "Telefone: " . $_GET['telefone_fornecedor']. "<br/>";
        echo "Email: " . $_GET['email_fornecedor']. "<br/>";
    } else {
        echo "Erro: Dados do fornecedor não foram recebidos corretamente.";
    }
    ?>
</body>

</html>