<?php include 'includes/cabecalho.php'; ?>
<?php include 'includes/conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizualizar Funcionários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h2>Lista de Funcionários</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
            <?php
            $resultado = $conn->query("SELECT * FROM funcionarios");
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['cargo']}</td>
                        <td><img src='mostrar_foto.php?id={$row['id']}' width='80'></td>
                        <td>
                            <a href='atualizar.php?id={$row['id']}'>Editar</a> | 
                            <a href='deletar.php?id={$row['id']}' onclick=\"return confirm('Tem certeza?');\">Excluir</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </main>
    
</body>
</html>

