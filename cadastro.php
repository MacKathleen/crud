<?php
include "funcoes.php";
//processar cadastro usuario

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {

    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    salvarUsuario($novoUsuario, $novaSenha);
    echo "Usuario cadastrado com sucesso";
}
//processa exclusao do usuario 

if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirUsuario($index);
    header("Location:cadastro.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>CADASTRE UM NOVO USUÁRIO</h2>
    <form method="POST" action="cadastro.php">
        <input type="text" name="usuario" id="usuario" placeholder="usuario" require> <br>
        <input type="password" name="senha" id="senha" placeholder="senha" require> <br>
        <link rel="stylesheet" href="StyleCadastro.css">

        <button type="submit">Cadastrar</button>
    </form>

    <h3>Usuários Cadastrados</h3>
    <?php listarUsuarios(); ?>

    <a href="login.php">VOLTAR</a>


</body>

</html>