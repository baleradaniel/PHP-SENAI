
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <h2>Funcionario</h2>
        <!-- Formulário de cadastro de funcionário -->
        <form action="salvar_funcionario.php" method="post" enctype="multipart/form-data">
            <label for="name">Nome: </label>
            <input type="text" id="nome" name="nome" required>
            <br>

            <label for="Telefone">Telefone:</label>
            <textarea id="telefone" name="telefone" required></textarea>
            <br>

            <label for="imagem">Imagem:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
            <br>
            
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    
</body>
</html>
