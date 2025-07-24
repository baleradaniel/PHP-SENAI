<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    
    <form action="">
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome">
            </label>
            <br>
            <br>
            <br>
            <label>
                Descrição da Tarefa:
                <textarea name="descricao"></textarea>
            </label>
            <br>
            <br>
            <br>
            <label>
                Prazo da Tarefa:
                <input type="text" name="prazo">
            </label>
            <br>
            <br>
            <br>
            <fieldset>
                <legend>Prioridade da Tarefa:</legend>
                <label>
                    <input type="radio" name="prioridade" value="baixa" checked> Baixa
                    <input type="radio" name="prioridade" value="media"> Média
                    <input type="radio" name="prioridade" value="alta"> Alta
                </label>
                <br>
                <br>
                <br>
            </fieldset>
            <label>
                Tarefa concluída:
                <input type="checkbox" name="concluida" value="sim">
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
    <table>
        <tr>
            <th>Tarefas</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluida</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
        <tr>
            <td><?php echo $tarefa['nome']; ?></td>
            <td><?php echo $tarefa['descricao']; ?></td>
            <td><?php echo $tarefa['prazo']; ?></td>
            <td><?php echo $tarefa['prioridade']; ?></td>
            <td><?php echo $tarefa['concluida']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>