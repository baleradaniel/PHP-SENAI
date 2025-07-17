<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nota = 7.5; // Definindo a nota

        // Verificando se a nota é maior ou igual a 6
        if ($nota >= 7) {
            echo "Aprovado com nota: $nota";
        }
        if ($nota < 7 && $nota >= 3) {
            echo "Pegou exame com nota: $nota";
        }
        if ($nota < 3) {
            echo "Reprovado com nota: $nota";
        }
    ?>
</body>
</html>