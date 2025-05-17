<?php
require_once 'ContatoDAO.php';
$dao = new ContatoDAO();

if (
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['telefone']) && !empty($_POST['telefone']) &&
    isset($_POST['email']) && !empty($_POST['email'])
) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'] ?? null;

    $contato = new Contato(null, $nome, $telefone, $email, $endereco);
    $dao->create($contato);
    
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Contato</title>
</head>
<body>
    <h2>Cadastrar Novo Contato:</h2>

    <form action="contato_form.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Endereço:</label>
        <input type="text" name="endereco">

        <button type="submit">Salvar</button>
    </form>
</body>
</html>