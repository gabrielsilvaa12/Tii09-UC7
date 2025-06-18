<?php

require_once __DIR__ . '/../dao/ProdutoDAO.php';
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../core/authService.php';

$usuarioLogado = login();
$isLogged = ($usuarioLogado !== null);

$produto = null;
$mensagemErro = '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: listar.php');
    exit();
}

$produtoDao = new ProdutoDAO();
$produto = $produtoDao->getById($id);

if (!$produto) {
    $mensagemErro = "Produto não encontrado ou ID inválido.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto ? htmlspecialchars($produto->getNome()) : 'Detalhes do Produto'; ?></title>
    <link rel="stylesheet" href="../css/style.css">  </head>
</head>
<body>

    <h1>Detalhes do Produto</h1>

    <nav>
        <a href="../index.php">Home</a>
        <a href="listar.php">Voltar para a Lista</a>
        <?php if ($isLogged): ?>
            <a href="criar.php">Novo Produto</a>
            <a href="../logout.php">Sair</a>
        <?php else: ?>
            <a href="../login.php">Login</a>
            <a href="../cadastro.php">Cadastrar</a>
        <?php endif; ?>
    </nav>

    <hr>

    <?php if ($mensagemErro): ?>
        <p class="error-message"><?php echo htmlspecialchars($mensagemErro); ?></p>
    <?php elseif ($produto): ?>
        <div class="product-detail">
            <p><strong>ID:</strong> <?php echo htmlspecialchars($produto->getId()); ?></p>
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($produto->getNome()); ?></p>
            <p><strong>Preço:</strong> R$ <?php echo htmlspecialchars(number_format($produto->getPreco(), 2, ',', '.')); ?></p>
            <p><strong>Ativo:</strong> <?php echo $produto->getAtivo() ? 'Sim' : 'Não'; ?></p>
            <p><strong>Data de Cadastro:</strong> <?php echo htmlspecialchars($produto->getDataDeCadastro()); ?></p>
            <p><strong>Data de Validade:</strong> <?php echo htmlspecialchars($produto->getDataDeValidade()); ?></p>
            
            <?php if ($isLogged): ?>
                <p>
                    <a href="editar.php?id=<?php echo htmlspecialchars($produto->getId()); ?>">Editar Produto</a> |
                    <a href="excluir.php?id=<?php echo htmlspecialchars($produto->getId()); ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir Produto</a>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</body>
</html>