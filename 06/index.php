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
</head>
<body>
    <h2>Lista de Contatos</h2>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($contatos as $c): ?>
            <tr>
                <td><?= $c->getId() ?></td>
                <td><?= $c->getNome() ?></td>
                <td>
                    <a href="#">Detalhes</a>
                    <a href="#">Editar</a>
                    <a href="#">Excluir</a>                
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>