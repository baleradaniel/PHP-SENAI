<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # rand - gera um número aleatório
        $sorteio = rand(0, 5);
        echo "Sorteado: $sorteio <hr/>";
        # array_merge - combina um ou mais arrays
        # range - cria um array contendo uma sequência de números
        # (inicio, fim, passo)
        # $vetor - array que combina números de 0 a 10, números pares a partir do sorteio até 10, e o número sorteado
        $vetor = array_merge(
            range(0, 10),
            range($sorteio, 10, 2),
            array($sorteio));
        # print_r - exibe informações sobre uma variável como um array
        print_r($vetor);
        echo "<hr/>";
        # shuffle - embaralha os elementos de um array
        shuffle($vetor);
        print_r($vetor);
        echo "<hr/>";
        foreach ($vetor as $valor) {
            echo "O valor ", $valor, " tem 3 elementos. <br/>";
        }
    ?>
</body>
</html>