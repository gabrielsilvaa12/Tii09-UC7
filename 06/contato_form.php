<?php
require_once 'ContatoDAO.php';
$dao = new ContatoDAO();

if(isset($_POST['nome']))
{
    $nome = $_POST['nome'];
    $contato = new Contato(null, $nome); 
    $dao->create($contato );

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

        <button type="submit">Salvar</button>
    </form>
</body>
</html>