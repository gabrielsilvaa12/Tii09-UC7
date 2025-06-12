<?php
session_start();
require_once '../UsuarioDAO.php';
require_once '../Usuario.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $confirmSenha = filter_input(INPUT_POST, 'confirmSenha');

    if($senha !== $confirmSenha || !$nome || !$email || !$senha) 
    {
        $erro = "Dados inválidos ou senhas não conferem!";
    }
    else
    {
        $dao = new UsuarioDAO();
        if($dao->getByEmail($email)) 
        {
            $erro = "Já existe usuário com esse email";
        }
        else
        {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(25));            
            $usuario = new Usuario(null, $nome, $senhaHash, $email, $token);
            if($dao->create($usuario))
            {
                $_SESSION['token'] = $token;
                header('Location: index.php');
                exit();
            }
            else
            {
                $erro = "Erro ao cadastrar usuário!";
            }
        }
    }
}

?>

<h1>Cadastro</h1>
<?php if(isset($erro)) echo "<p style='color: red'>$erro</p>"; ?>
<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    Confirmar Senha: <input type="password" name="confirmSenha" required><br>
    <button type="submit">Cadastrar</button>
</form>

<a href="#">Já tem conta?</a>