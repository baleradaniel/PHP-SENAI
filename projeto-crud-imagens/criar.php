<?php include 'includes/cabecalho.php'; ?>
<?php include 'includes/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Funcionário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
            $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    
            $sql = "INSERT INTO funcionarios (nome, cargo, foto) VALUES ('$nome', '$cargo', '$foto')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Funcionário cadastrado com sucesso!</p>";
            } else {
                echo "<p>Erro: " . $conn->error . "</p>";
            }
        }
        ?>
    
        <h2>Cadastrar Funcionário</h2>
        <form method="post" enctype="multipart/form-data">
            <label>Nome:</label><br>
            <input type="text" name="nome" required><br><br>
    
            <label>Cargo:</label><br>
            <input type="text" name="cargo" required><br><br>
    
            <label>Foto:</label><br>
            <input type="file" name="foto" accept="image/*" required><br><br>
    
            <input type="submit" value="Cadastrar">
        </form>
    </main>
    
</body>
</html>
