<?php
require 'conexao.php';

$conexao = conectarBanco();
$stmt = $conexao -> prepare('SELECT * FROM cliente');
$stmt -> execute();
$clientes = $stmt -> fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
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
    <h2>Lista de Clientes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>E-mail</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                <td><?= htmlspecialchars($cliente['email']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>