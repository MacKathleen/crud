<?php
//carregar varios arquivos 


function carregarAgenda()
{
    $usuarios = [];
    if (file_exists("agenda.txt")) {
        $dados = file("agenda.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($dados as $linha) {
            $partes = explode(":", $linha);
            if (count($partes) === 2) { // Verifica se o formato está correto
                list($usuario, $telefone) = $partes;
                $usuarios[] = ["usuario" => $usuario, "telefone" => $telefone];
            } else {
                // Tratamento de erro: ignorar ou exibir uma mensagem para a linha incorreta
                echo "Erro: Formato incorreto na linha '$linha'.<br>";
            }
        }
    }

    return $usuarios;
}

//salvar um novo usuario no arquivo 

function salvarAgenda($usuario, $telefone)
{
    $linha = $usuario . ":" . $telefone . PHP_EOL;
    file_put_contents("agenda.txt", $linha, FILE_APPEND);
}

//listar usuarios cadastrados 

function listarAgenda()
{
    $usuarios = carregarAgenda();
    echo "<ul>";

    foreach ($usuarios as $index => $user) {
        echo "<li>";
        echo htmlspecialchars($user["usuario"]) . //echo para mostrar 
            "<a href ='cadastro.php? excluir=" . $index . "'> Excluir </a> | " .
            "<a href='alterar.php? editar=$index'> alterar </a></li>";
    }
    echo "</ul>";
}

//excluir 

function excluirAgenda($index)
{
    $usuarios = carregarAgenda();

    if (isset($usuario[$index])) {
        unset($usuarios[$index]);
        file_put_contents("agenda.txt", "");

        foreach ($usuarios as $user) {
            salvarAgenda($user["usuario"], $user["telefone"]);
        }
    }
}

function alterarAgenda($index, $novoUsuario, $novoTelefone)
{
    $usuarios = carregarAgenda();

    if (isset($usuarios[$index])) {
        $usuarios[$index] = ["usuario" => $novoUsuario, "telefone", $novoTelefone];

        file_put_contents("agenda.txt", "");

        foreach ($usuarios as $user) {
            salvarAgenda($user["usuario"], $user["telefone"]);
        }
    }
}
