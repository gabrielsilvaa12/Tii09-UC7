<?php 
require_once '../backend/ClienteDAO.php';
$dao = new ClienteDAO();
$cliente = null;

if (isset($_GET['id'])) {
    $cliente = $dao->getById($_GET['id']);
}

if ($_POST) {
    $id = isset($_POST['id']) && $_POST['id'] !== '' ? (int) $_POST['id'] : null;
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

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $cliente ? 'Editar' : 'Novo' ?> Cliente</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1><?= $cliente ? 'Editar' : 'Cadastrar' ?> Cliente</h1>

    <form method="post">
        <input type="hidden" name="id" value="<?= $cliente ? $cliente->getId() : '' ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required value="<?= $cliente ? $cliente->getNome() : '' ?>">
        <br><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required value="<?= $cliente ? $cliente->getCpf() : '' ?>">
        <br><br>

        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" name="dataNascimento" id="dataNascimento" required value="<?= $cliente ? $cliente->getDataNascimento() : '' ?>">
        <br><br>

        <label for="ativo">Ativo:</label>
        <input type="checkbox" name="ativo" id="ativo" <?= $cliente && $cliente->getAtivo() ? 'checked' : '' ?>>
        <br><br>

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="../index.php">Voltar</a>
</body>
</html>