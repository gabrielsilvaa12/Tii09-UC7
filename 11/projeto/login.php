<?php
// session_start();

require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../model/Usuario.php';
require_once __DIR__ . '/../core/authService.php'; // Inclua o authService para a função checkLogin

// Se o usuário já estiver logado, redireciona para a página principal (index.php)
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');

    if (!$email || !$senha) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getByEmail($email);

        if ($usuario && password_verify($senha, $usuario->getSenha())) {
            $token = bin2hex(random_bytes(25));
            $_SESSION['token'] = $token;
            $dao->updateToken($usuario->getId(), $token);
            header('Location: index.php');
            exit();
        } else {
            $erro = "Email ou senha inválidos!";
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">  </head>

<h1>Login</h1>
<?php if (isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>

<p>Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a>.</p>