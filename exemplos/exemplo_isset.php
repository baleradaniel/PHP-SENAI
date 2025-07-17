<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = "Xenia";
        #$name = NULL;

        if (isset($name)) {
            print "This line is printed because \$name isn't NULL.";
        }
    ?>
</body>
</html>