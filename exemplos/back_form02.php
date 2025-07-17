<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Backend</title>
</head>
<body>
<?php
        if (isset($_GET['nome']) && isset($_GET['idade'])) {
            echo "Recebido o cliente ".$_GET['nome'];
            echo " que tem ".$_GET['idade']." anos";
        }
    ?>
</body>
</html>