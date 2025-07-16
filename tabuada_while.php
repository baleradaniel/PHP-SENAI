<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada PHP</title>
</head>
<body>
    <?php
        $numero = 1; 
        $contador = 1;

        while ($contador <= 10 && $numero <= 10) {
            echo "<h2>Tabuada do $numero</h2>";
            while ($contador <= 10) {
                $resultado = $numero * $contador;
                echo "$numero x $contador = $resultado<br>";
                $contador++;
            }
            $contador = 1; 
            $numero++;
        }
    ?>
</body>
</html>