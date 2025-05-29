<?php
require_once '../backend/ClienteDAO.php';
$dao = new ClienteDAO();

if(!isset($_GET['id'])) {
    header("location: ../index.php");
    exit;
}

$cliente = $dao->getById($_GET["id"]);

if(!$cliente) {
    echo "Produto não encontrado.";
    echo "<a href='../index.php'>Voltar</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Detalhes do Cliente</h1>

    <p><strong>ID:</strong> <?= $cliente->getId() ?></p>
    <p><strong>Nome:</strong> <?= $cliente->getNome() ?></p>
    <p><strong>CPF:</strong> <?= $cliente->getCpf() ?></p>
    <p><strong>Data de Nascimento:</strong> <?= $cliente->getDataNascimento() ?></p>
    <p><strong>Status:</strong> <?= $cliente->getAtivo() ? 'Ativo' : 'Inativo' ?></p>

    <a href="../index.php">Voltar</a>
</body>
</html>