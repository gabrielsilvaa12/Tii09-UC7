<?php

require_once 'ContatoDAO.php';
$dao = new ContatoDAO();
$contatos = $dao->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
    color: #333;
}

h2 {
    color: #222;
}

a {
    text-decoration: none;
    color: #007bff;
    margin-right: 8px;
    transition: 0.2s ease-in-out;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    background-color: #fff;
    box-shadow: 0 0 10px #ccc;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:hover {
    background-color: #f1f1f1;
}

button {
    padding: 6px 10px;
    background-color: #007bff;
    border: none;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <h2>Lista de Contatos</h2>

    <a href="contato_form.php">Cadastrar Contato</a><br>
    
    <table border="1" cellpadding="5">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($contatos as $c): ?>
            <tr>
                <td><?= $c->getNome() ?></td>
                <td><?= $c->getTelefone() ?></td>
                <td>
                    <a href="contato_details.php?id=<?= $c->getId() ?>">Detalhes</a>
                    <a href="#">Editar</a>
                    <a href="contato_delete.php?id=<?= $c->getId() ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>