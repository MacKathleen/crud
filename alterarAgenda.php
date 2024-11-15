<?php
include "funcoesAgenda.php";

if (isset($_GET["editar"])) {
    $index = $_GET["editar"];
    $usuarios = carregarAgenda();

    if (isset($usuarios[$index])) {
        $usuarioAtual = $usuarios[$index]["usuario"];
        $telefoneAtual = $usuarios[$index]["telefone"];
    } else {
        echo "Usuario não encontrado!";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["telefone"])) {
    $novoUsuario = $_POST["usuario"];
    $novoTelefone = $_POST["telefone"];

    echo $novoUsuario;
    echo "<br><br>";
    echo $novoTelefone;

    alterarAgenda($index, $novoUsuario, $novoTelefone);
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleAlterar.css">

    <title>Alterar Usuário</title>
</head>

<body>
    <h2>Alterar Usuário</h2>
    <form method="POST">
        <label for="usuario">Nome:</label>
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuarioAtual); ?>" required> <br>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" value="<?php echo htmlspecialchars($telefoneAtual); ?>" required> <br>

        <button type="submit">Salvar Alterações</button>
    </form>

    <a href="index.php">Voltar</a>
</body>



</html>