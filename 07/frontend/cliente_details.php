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