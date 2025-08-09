<?php include 'includes/cabecalho.php'; ?>
<?php include 'includes/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Funcionários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <?php
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM funcionarios WHERE id = $id");
        $func = $result->fetch_assoc();
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
    
            if ($_FILES['foto']['size'] > 0) {
                $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
                $sql = "UPDATE funcionarios SET nome='$nome', cargo='$cargo', foto='$foto' WHERE id=$id";
            } else {
                $sql = "UPDATE funcionarios SET nome='$nome', cargo='$cargo' WHERE id=$id";
            }
    
            if ($conn->query($sql) === TRUE) {
                echo "<p>Dados atualizados com sucesso!</p>";
            } else {
                echo "<p>Erro: " . $conn->error . "</p>";
            }
        }
        ?>
    
        <h2>Editar Funcionário</h2>
        <form method="post" enctype="multipart/form-data">
            <label>Nome:</label><br>
            <input type="text" name="nome" value="<?= $func['nome'] ?>" required><br><br>
    
            <label>Cargo:</label><br>
            <input type="text" name="cargo" value="<?= $func['cargo'] ?>" required><br><br>
    
            <label>Foto:</label><br>
            <input type="file" name="foto" accept="image/*"><br><br>
    
            <input type="submit" value="Atualizar">
        </form>
    </main>
    
</body>
</html>

