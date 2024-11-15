<?php
include "funcoesAgenda.php";
//processar cadastro usuario

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["telefone"])) {

    $novoUsuario = $_POST["usuario"];
    $novoTelefone = $_POST["telefone"];
    salvarUsuario($novoUsuario, $novoTelefone);
    echo "Usuario cadastrado com sucesso";
}
//processa exclusao do usuario 

if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirUsuario($index);
    header("Location:cadastroAgenda.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleCadastro.css">

    <title>Agenda</title>
</head>

<body>
    <h2> Agenda </h2>
    <form method="POST" action="cadastroAgenda.php">
        <input type="text" name="usuario" id="usuario" placeholder="usuario" require> <br>
        <input type="tel" name="telefone" id="telefone" placeholder="telefone" require> <br>
        <button type="submit">Cadastrar</button>
    </form>

    <h3>Usuários Cadastrados</h3>
    <?php listarUsuarios(); ?>

    <a href="login.php">VOLTAR</a>


</body>

</html>