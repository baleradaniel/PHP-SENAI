<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $valores = array("Daniel Balera", "16", "M", "16");
        list($usuario, $idade, $genero, $qi) = $valores;
        echo "Usuario:" . $usuario . "<br>";
        echo "Idade:" . $idade . "<br>";
        echo "Gênero:". $genero . "<br>";
        echo "QI:". $qi . "<br>";  
    ?>
</body>
</html>