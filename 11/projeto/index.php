<?php

require_once __DIR__ . '/../core/authService.php'; // <-- Adicione o '../' de volta aqui!

$usuarioLogado = login();
$isLogged = ($usuarioLogado !== null);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">  </head>

<h1>Vai rodar?!</h1>

    <nav>
        <a href="index.php">Home</a>

        <?php if ($isLogged): ?>
            <a href="../produtos/criar.php">Novo Produto</a>
            <a href="logout.php">Sair</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="cadastro.php">Cadastrar</a>
        <?php endif; ?>
    </nav>

    <hr>

    <?php if ($isLogged): ?>
        <p>Olá, <?php echo htmlspecialchars($usuarioLogado->getNome()); ?>! Que bom ter você de volta.</p>
    <?php else: ?>
        <p>Para aproveitar todos os recursos, por favor, faça <a href="login.php">Login</a> ou <a href="cadastro.php">Cadastre-se</a>.</p>
    <?php endif; ?>

    <section>
        <h2>Nossos Produtos</h2>
        <ul>
            <li><a href="../produtos/listar.php">Ver todos os produtos</a></li>
        </ul>
    </section>
