<?php

require_once 'ContatoDAO.php';

if(!isset($_GET['id'])) {
    echo "Id do contato não fornecido";
    exit();
}

$dao = new ContatoDAO();
$contato = $dao->getById($_GET['id']);

if(!$contato) {
    echo 'Contato não encontrado no sistema!';
    exit();
}

// print_r($contato);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Contato</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
    color: #333;
}

h2 {
    color: #222;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    margin: 8px 0;
    background-color: #fff;
    padding: 10px;
    border-left: 5px solid #007bff;
    box-shadow: 0 0 5px rgba(0,0,0,0.05);
}

strong {
    color: #111;
}

a {
    display: inline-block;
    margin-top: 20px;
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.2s;
}

a:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <h2>Detalhes do Contato</h2>

    <p><strong>ID: </strong><?= $contato->getId() ?></p>
    <p><strong>Nome: </strong><?= $contato->getNome() ?></p>
    <p><strong>Telefone: </strong><?= $contato->getTelefone() ?></p>
    <p><strong>Email: </strong><?= $contato->getEmail() ?></p>
    <p><strong>Endereço: </strong><?= $contato->getEndereco()  ?? 'NÃO INFORMADO' ?></p>

    <br>
    <a href="index.php">Voltar</a>
</html>