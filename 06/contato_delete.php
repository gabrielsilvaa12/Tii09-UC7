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

$dao->delete($contato->getId());
header('Location: index.php');
exit();

?>