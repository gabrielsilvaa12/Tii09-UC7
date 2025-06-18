<?php

require_once __DIR__ . '/../dao/ProdutoDAO.php';
require_once __DIR__ . '/../core/authService.php';
 
checkLogin();
 
$mensagemSucesso = '';
$mensagemErro = '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 
if (!$id) {
    $mensagemErro = "ID do produto não fornecido ou inválido para exclusão.";
} else {
    $produtoDao = new ProdutoDAO();
            if ($produtoDao->delete($id)) {
                $mensagemSucesso = "Produto excluído com sucesso!";
            } else {
                $mensagemErro = "Erro ao excluir o produto. Tente novamente.";
            }
}
 
// 3. Armazenar a mensagem na sessão e redirecionar para a lista de produtos
if ($mensagemSucesso) {
    $_SESSION['mensagem_sucesso'] = $mensagemSucesso;
} elseif ($mensagemErro) {
    $_SESSION['mensagem_erro'] = $mensagemErro;
}
 
header('Location: listar.php'); // Redireciona para a página de listagem
exit(); // Encerra o script
?>