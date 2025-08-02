<?php
require_once 'conexao.php';

$conexao = conectarBanco();

$sql = 'SELECT id_cliente, nome, endereco, telefone, email FROM cliente ORDER BY nome ASC';
$stmt = $conexao->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
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
    <h2>Todos clientes cadastrados</h2>

    <?php if (!$clientes): ?>
        <p>Nenhum cliente encontrado.</p>
    
    <?php else: ?>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ação</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                <td><?= htmlspecialchars($cliente['email']) ?></td>
                <td>
                    <a href="atualizarCliente.php?id=<?=$cliente['id_cliente']?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>
    <?php endif; ?>
</body>
</html>