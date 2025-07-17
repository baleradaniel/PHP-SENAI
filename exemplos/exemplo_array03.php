<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Array 03</title>
</head>
<body>
    <?php
        $musicas = array(
            array("The Beatles", "All My Loving", 1965),
            array("Iron Maiden", "Only the Good Die Young", 1988),
            array("Angra", "Nova Era", 2001)
        );
        for ($linha = 0; $linha < 3; $linha++){
            for ($coluna = 0; $coluna < 3; $coluna++){
                echo $musicas[$linha][$coluna] . " | ";
            }
            echo "<br/>";
        }
    ?>
</body>
</html>