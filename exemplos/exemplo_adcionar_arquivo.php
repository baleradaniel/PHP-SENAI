<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # FILE_IGNORE_NEW_LINES remove as quebras de linha do final de cada linha
        $linhas = file("texto.txt", FILE_IGNORE_NEW_LINES);
        var_dump($linhas);
        foreach ($linhas as $linha_num => $linha) {
            echo "Linha #{$linha_num}:". $linha."<br>";
        }
    ?>
</body>
</html>