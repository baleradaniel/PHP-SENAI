<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedor</title>
    <script src="validacao.js"></script>
    <link rel="stylesheet" type="text/CSS" href="estilo.css" media="all">
</head>

<ul>

    <li><a href="Menu.html">Inicio</a>
    <li><a href="#">Novidade</a>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Cadastro</a>
        <div class="dropdown-content">
            <a href="Formulario_produto.html">Novo jogo</a>
            <a href="Formulario_cliente.html">Novo cliente</a>
            <a href="formulario_fornecedor.html">Novo fornecedor</a>
        </div>
    </li>
</ul>
<body>
    <center>
        <table align="center">
            <form method="get" action="back_fornecedor.php">
                <img src="image/logo.png" height="100" width="100"><br>

                <tr align="left">
                    <h1>Cadastro de Fornecedor</h1>
                    <h5>Daniel Balera</h5>
                </tr>

                <tr align="left">
                    <td><label for="nome_fornecedor">Nome do Fornecedor:</label></td>
                    <td><input type="text" id="nome_fornecedor" name="nome_fornecedor" required></td>
                </tr>

                <tr align="left">
                    <td><label for="cnpj_fornecedor">CNPJ:</label></td>
                    <td><input type="text" id="cnpj_fornecedor" name="cnpj_fornecedor" required onkeypress="mascaras(this,formatarCNPJ)"></td>
                </tr>

                <tr align="left">
                    <td><label for="endereco_fornecedor">Endereço:</label></td>
                    <td><input type="text" id="endereco_fornecedor" name="endereco_fornecedor" required></td>
                </tr>

                <tr align="left">
                    <td><label for="cidade_fornecedor">Cidade:</label></td>
                    <td><input type="text" id="cidade_fornecedor" name="cidade_fornecedor"></td>
                </tr>

                <tr align="left">
                    <td><label for="estado_fornecedor">Estado:</label></td>
                    <td><input type="text" id="estado_fornecedor" name="estado_fornecedor"></td>
                </tr>

                <tr align="left">
                    <td><label for="telefone_fornecedor">Telefone:</label></td>
                    <td><input type="text" id="telefone_fornecedor" name="telefone_fornecedor" required onkeypress="mascaras(this,telefone)"></td>
                </tr>

                <tr align="left">
                    <td><label for="email_fornecedor">E-mail:</label></td>
                    <td><input type="email" id="email_fornecedor" name="email_fornecedor"></td>
                </tr>

                <tr align="left">
                    <td><label for="tipo_produto">Tipo de Jogos Fornecidos:</label></td>
                    <td>
                        <select name="tipo_produto" id="tipo_produto">
                            <option value="">-- Selecione --</option>
                            <option value="fisico">Jogos Físicos</option>
                            <option value="digital">Jogos Digitais</option>
                            <option value="outros">Outros</option>
                        </select>
                    </td>
                </tr>

                <tr align="left">
                    <td colspan="2">
                        <br>
                        <button>Cadastrar Fornecedor</button>
                        <button>Limpar</button>
                    </td>
                </tr>

            </form>
        </table>
    </center>
</body>

</html>