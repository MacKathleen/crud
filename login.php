<?php
include "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $usuarioValido = false; 

    // Carrega os usuários do arquivo
    $usuarios = carregarUsuarios();

    // Verificar se o usuário e a senha estão no vetor $usuarios
    foreach ($usuarios as $user) {
        if ($user["usuario"] === $usuario && $user["senha"] === $senha) {
            $usuarioValido = true;
            break;
        }
    }


    if ($usuarioValido) {
        // Define o cookie para o login por 5 minutos (300 segundos)
        setcookie("usuario_logado", "1", time() + 300, "/");
        header("Location: index.php");
        exit;
    } else {
        echo "Usuário ou senha incorreta";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleLogin.css">
    <title>login</title>
</head>

<body>
    <h2>Login de usuário</h2>

    <form method="POST" action="login.php">
        <input type="text" name="usuario" id="usuario" placeholder="digite seu usuário" required> <br>
        <input type="password" name="senha" id="senha" placeholder="digite sua senha" required> <br>
        <button type="submit">Entrar</button>
    </form>

    <a href="cadastro.php">Não tem cadastro? Clique aqui </a>
</body>

</html>