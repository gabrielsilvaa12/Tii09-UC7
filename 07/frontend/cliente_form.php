<?php 
require_once '../backend/ClienteDAO.php';
$dao = new ClienteDAO();
$cliente = null;

if (isset($_GET['id'])) {
    $cliente = $dao->getById($_GET['id']);
}

if ($_POST) {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $ativo = $_POST['ativo'] ? true : false;
    $dataNascimento = $_POST['dataNascimento'] ?? null;

    $cliente = new Cliente($id, $nome, $cpf, $ativo, $dataNascimento);

    if ($id) {
        $dao->update($cliente);
    } else {
        $dao->create($cliente);
    }

    header("Location: ../index.php");
    exit;

}