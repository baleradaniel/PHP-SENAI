<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<ul class="navbar">
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">MENU</a>
            <div class="dropdown-content">
                <a href="inserirCliente.php">Inserir Cliente</a>
                <a href="pesquisarCliente.php">Pesquisar Cliente</a>
                <a href="atualizarCliente.php">Atualizar Cliente</a>
                <a href="buscarCliente.php">Buscar Cliente</a>
                <a href="deletarCliente.php">Deletar Cliente</a>
                <a href="listarCliente.php">Listar Cliente</a>

            </div>
        </li>
    </ul>
    <h2>Cadastro de Cliente</h2>
    <form action="processarInsercao.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>    
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>