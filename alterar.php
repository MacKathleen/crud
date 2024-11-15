<?php
include "funcoes.php";

if (isset($_GET["editar"])) {
    $index = $_GET["editar"];
    $usuarios = carregarUsuarios();

    if (isset($usuario[$index])) {
        $usuarioAtual = $usuarios[$index]["usuario"];
        $senhaAtual = $usuarios["index"]["senha"];
    } else {
        echo "Usuario não encontrado!";
        exit;
    }
}

//processa alteração usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $POST["usuario"];
    $novaSenha = $_POST["senha"];
    alterarUsuario($index, $novoUsuario, $novoSenha);
    header("Location: Cadastro.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuáriot</title>
</head>

<body>
    <h2>Alterar Usuario</h2>
    <form method="POST">
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuarioAtual); ?>" required> <br>
        <input type="password" name="senha" value="<?php echo htmlspecialchars($senhaAtual); ?>" required> <br>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>

</html>