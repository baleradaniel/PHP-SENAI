<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcao de Strings</title>
</head>
<body>
    <?php
        # index 012345678902345
        $name = "Stefanie Hatcher";
        echo "$name <br><br/>";
        $length = strlen($name);
        echo ("$length <br><br/>");
        $cmp = strcmp($name, "Brian Le");
        echo ("$cmp <br><br/>");
        $index = strpos($name, "e");
        echo ("$index <br><br/>");
        $first = substr($name, 9, 5);
        echo ("$first <br><br/>");
        $name = strtoupper($name);
        echo "$name";
    ?>
</body>
</html>