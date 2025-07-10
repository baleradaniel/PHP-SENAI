<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcao de Strings</title>
</head>
<body>
    <?php
        # index Stefanie Hatcher = 012345678902345
        $name = "Stefanie Hatcher";
        echo "$name <br><br/>";
        // strlen() - Calcula o comprimento da string
        $length = strlen($name);
        echo ("$length <br><br/>");
        // strcmp() - Compara duas strings
        // Retorna 0 se forem iguais, <0 se a primeira for menor, >0 se a primeira for maior.
        $cmp = strcmp($name, "Brian Le");
        echo ("$cmp <br><br/>");
        // strpos() - Encontra a posição da primeira ocorrência de uma substring
        $index = strpos($name, "e");
        echo ("$index <br><br/>");
        // substr() - Retorna parte de uma string
        // Começa na posição 9 e pega 5 caracteres.
        $first = substr($name, 9, 5);
        echo ("$first <br><br/>");
        // strtoupper() - Converte a string para maiúsculas
        $name = strtoupper($name);
        echo "$name";
    ?>
</body>
</html>