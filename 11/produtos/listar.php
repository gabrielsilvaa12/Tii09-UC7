<?php

require_once __DIR__ . ('/../dao/ProdutoDAO.php');
require_once __DIR__ . ('/../model/Produto.php');
require_once __DIR__ . ('/../core/authService.php');

$usuarioLogado = login();
$isLogged = ($usuarioLogado !== null);
$produtoDao = new ProdutoDAO();
$produtos = $produtoDao->getAll();

?>

<h1>Nossos Produtos</h1>

    <nav>
        <a href="../projeto/index.php">Home</a>
        <?php if ($isLogged): ?>
            <a href="criar.php">Novo Produto</a> 
            <a href="../projeto/logout.php">Sair</a>
        <?php else: ?>
            <a href="../login.php">Login</a>
            <a href="../cadastro.php">Cadastrar</a>
        <?php endif; ?>
    </nav>

    <hr>

    <?php if (empty($produtos)): ?>
        <p>Nenhum produto encontrado.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ativo</th>
                    <th>Data de Cadastro</th>
                    <th>Data de Validade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produto->getId()); ?></td>
                    <td><?php echo htmlspecialchars($produto->getNome()); ?></td>
                    <td>R$ <?php echo htmlspecialchars(number_format($produto->getPreco(), 2, ',', '.')); ?></td>
                    <td><?php echo $produto->getAtivo() ? 'Sim' : 'Não'; ?></td>
                    <td><?php echo htmlspecialchars($produto->getDataDeCadastro()); ?></td>
                    <td><?php echo htmlspecialchars($produto->getDataDeValidade()); ?></td>
                    <td>
                        <a href="ver.php?id=<?php echo htmlspecialchars($produto->getId()); ?>">Ver Detalhes</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
