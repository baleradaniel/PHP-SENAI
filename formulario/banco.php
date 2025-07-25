<?php
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = '';  
    $bdBanco = 'daniel_balera_ds';
    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
        if (mysqli_connect_errno()){
            echo 'Problemas para conecar no banco.';
            die();
        }
    ?>