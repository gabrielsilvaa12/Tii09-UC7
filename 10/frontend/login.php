<?php
session_start();
require_once '../UsuarioDAO.php';

if(isset($_SESSION['token']))
{
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');

    $dao = new UsuarioDAO();
    $usuario = $dao->getByEmail($email);

    if($usuario && password_verify($senha, $usuario->getSenha()))
    {
        $token = bin2hex(random_bytes(25));
        $_SESSION['token'] = $token;
        $dao->updateToken($usuario->getId(), $token);
        header('Location: index.php');
        exit();
    } 
    else 
    {
        $erro = "Email ou senha inválidos!";
    }
}

?>

<h1>Login</h1>
<?php if (isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>