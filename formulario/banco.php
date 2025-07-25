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

        function buscar_tarefas($conexao) {
            $sqlBusca = 'SELECT * FROM tarefas';
            $resultado = mysqli_query($conexao, $sqlBusca);
            $tarefas = array();
            while ($tarefa = mysqli_fetch_assoc($resultado)) {
                $tarefas[] = $tarefa;
            }
        return $tarefas;
        }
    ?>