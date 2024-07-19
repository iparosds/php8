<?php session_start(); // Inicia a sessão.

// Se a variável tarefas não existe, crie.
if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = array();
}

// Se esta recebendo uma nova tarefa do formulário, adicione na sessão.
if (!empty($_POST["tarefa"])) {
    $_SESSION['tarefas'][] = $_POST["tarefa"];
}

// Removendo a tarefa.
if (isset($_GET['tarefa_id'])) {
    unset($_SESSION['tarefas'][(int)$_GET['tarefa_id']]);
    header("Location: todo.php"); // Redireciona para a mesma página para "limpar" o GET.
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de tarefas</title>
    <link href="estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Lista de tarefas</h1>

    <h2>Adicionar tarefa</h2>
    <form method="post" action="todo.php">
    <label for="tarefa">Tarefa:</label>
    <input type="text" name="tarefa" id="tarefa" placeholder="Escreva sua tarefa aqui" required>
        <button name="adicionar">Adicionar Tarefa</button>
    </form>
    <br>
    <h2>Tarefas a fazer</h2>
    <table>
        <tr>
            <th>id</th>
            <th>tarefa</th>
            <th>finalizar</th>
        </tr>
        <?php foreach ($_SESSION['tarefas'] as $chave => $valor): ?>
            <tr>
                <td><?php echo $chave; ?></td>
                <td><?php echo $valor; ?></td>
                <td><a href="todo.php?tarefa_id=<?php echo $chave; ?>">&#10060;</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
