<?php
include "funcoesAgenda.php"; 

if (isset($_COOKIE['usuario_logado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
    header('LOCATION:login.php');
    exit;
}


if (isset($_GET['excluir'])) {
    $index = $_GET['excluir'];
    excluirUsuario($index); 
    header("Location: index.php"); 
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Agenda</title>
</head>

<body>
    <h1>Bem-vindo, <?php echo $usuario; ?>!</h1>
    <p>Você está autenticado no sistema.</p>

    <h2>Agenda</h2>

    <h3>Usuários Cadastrados</h3>
    
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $agenda = carregarAgenda(); // Carrega os usuários
            foreach ($agenda as $index => $pessoa) {
                echo "<tr>";
                echo "<td>{$pessoa['usuario']}</td>";
                echo "<td>{$pessoa['telefone']}</td>";
                echo "<td>";
                
                echo "<a href='alterarAgenda.php?editar=$index'>Alterar</a> | ";
                echo "<a href='index.php?excluir=$index' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="cadastroAgenda.php">
        <button type="button">Cadastrar Novo Usuário</button>
    </a>

    <a href="login.php">Voltar</a>

    <form action="POST" action="logout.php">
        <button type="submit">Sair</button>
    </form>
</body>

</html>
