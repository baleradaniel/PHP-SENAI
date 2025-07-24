<?php
session_start();

if (isset($_GET['nome_fornecedor']) && isset($_GET['email_fornecedor']) && isset($_GET['telefone_fornecedor']) && isset($_GET['cnpj_fornecedor']) && isset($_GET['endereco_fornecedor']) && isset($_GET['cidade_fornecedor']) && isset($_GET['estado_fornecedor'])) {
    // Cria um array com os dados do fornecedor
    $novo_fornecedor = array(
        'nome_fornecedor' => $_GET['nome_fornecedor'],
        'email_fornecedor' => $_GET['email_fornecedor'],
        'telefone_fornecedor' => $_GET['telefone_fornecedor'],
        'cnpj_fornecedor' => $_GET['cnpj_fornecedor'],
        'endereco_fornecedor' => $_GET['endereco_fornecedor'],
        'cidade_fornecedor' => $_GET['cidade_fornecedor'],
        'estado_fornecedor' => $_GET['estado_fornecedor']
    );

    // Inicializa a sessão 'fornecedor' como array, se ainda não existir
    if (!isset($_SESSION['fornecedor']) || !is_array($_SESSION['fornecedor'])) {
        $_SESSION['fornecedor'] = array();
    }

    // Adiciona o novo fornecedor ao array de fornecedores
    $_SESSION['fornecedor'][] = $novo_fornecedor;
} else {
    echo "Erro: Dados do fornecedor não foram recebidos corretamente.";
}

// Recupera os fornecedores da sessão
$fornecedor = array();
if (isset($_SESSION['fornecedor']) && is_array($_SESSION['fornecedor'])) {
    $fornecedor = $_SESSION['fornecedor'];
} else {
    echo "Erro: Nenhum dado de fornecedor foi encontrado.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores Cadastrados</title>
</head>

<body>
    <table>
        <tr>
            <th>Fornecedores Cadastrados</th>
        </tr>
        <?php
        if (!empty($fornecedor)) {
            foreach ($fornecedor as $info):
                ?>
                <tr>
                    <td>
                        <?php
                        echo 'Nome: ' . $info['nome_fornecedor'] . '<br>' .
                            'Email: ' . $info['email_fornecedor'] . '<br>' .
                            'Telefone: ' . $info['telefone_fornecedor'] . '<br>' .
                            'CNPJ: ' . $info['cnpj_fornecedor'] . '<br>' .
                            'Endereço: ' . $info['endereco_fornecedor'] . '<br>' .
                            'Cidade: ' . $info['cidade_fornecedor'] . '<br>' .
                            'Estado: ' . $info['estado_fornecedor'];
                        ?>
                    </td>
                </tr>
                <?php
            endforeach;
        } else {
            echo "<tr><td>Nenhum fornecedor cadastrado.</td></tr>";
        }
        ?>
    </table>
</body>

</html>