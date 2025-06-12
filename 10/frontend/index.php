<?php
session_start();

$isLogged = isset($_SESSION['token']);
?>

<h1>Home</h1>

<nav>
    <a href="index.php">Home</a>
    <?php if ($isLogged): ?>
        <a href="usuario.php">Minha Conta</a>
        <a href="logout.php">Sair</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="cadastro.php">Cadastrar</a>
    <?php endif; ?>
</nav>
<p>Bem-vindo ao sistema!</p>