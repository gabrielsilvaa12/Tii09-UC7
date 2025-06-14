<?php

require_once __DIR__ . '/../dao/ProdutoDAO.php';
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../core/authService.php';

$usuarioLogado = checkLogin(true);
$nome = '';
$preco = '';
$ativo = 1; 
$dataDeCadastro = date('Y-m-d');
$mensagemSucesso = '';
$mensagemErro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT); 
    $ativo = filter_input(INPUT_POST, 'ativo', FILTER_VALIDATE_INT) ? 1 : 0; 
    $dataDeCadastro = filter_input(INPUT_POST, 'dataDeCadastro', FILTER_SANITIZE_SPECIAL_CHARS);
    $dataDeValidade = filter_input(INPUT_POST, 'dataDeValidade', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!$nome || $preco === false || !$dataDeCadastro || !$dataDeValidade || $preco <= 0) {
        $mensagemErro = "Por favor, preencha todos os campos obrigatórios corretamente (Nome, Preço, Datas. Preço deve ser maior que zero).";
    } else {

        $novoProduto = new Produto(null, $nome, $preco, (bool)$ativo, $dataDeCadastro, $dataDeValidade);

        $produtoDao = new ProdutoDAO();
        if ($produtoDao->create($novoProduto)) {
            $mensagemSucesso = "Produto cadastrado com sucesso!";
            $nome = '';
            $preco = '';
            $ativo = 1;
            $dataDeCadastro = date('Y-m-d');
            $dataDeValidade = '';
        } else {
            $mensagemErro = "Erro ao cadastrar o produto. Tente novamente.";
        }
    }
}
?>

<h1>Adicionar Novo Produto</h1>

    <nav>
        <a href="../index.php">Home</a>
        <a href="listar.php">Lista de Produtos</a>
        <a href="criar.php">Novo Produto</a>
        <a href="../logout.php">Sair</a>
    </nav>

    <hr>

    <?php if ($mensagemSucesso): ?>
        <p class="message-success"><?php echo htmlspecialchars($mensagemSucesso); ?></p>
    <?php endif; ?>

    <?php if ($mensagemErro): ?>
        <p class="message-error"><?php echo htmlspecialchars($mensagemErro); ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" value="<?php echo htmlspecialchars($preco); ?>" required><br>

        <label for="ativo">Ativo:</label>
        <input type="checkbox" id="ativo" name="ativo" value="1" <?php echo $ativo ? 'checked' : ''; ?>><br>

        <label for="dataDeCadastro">Data de Cadastro:</label>
        <input type="date" id="dataDeCadastro" name="dataDeCadastro" value="<?php echo htmlspecialchars($dataDeCadastro); ?>" required><br>

        <label for="dataDeValidade">Data de Validade:</label>
        <input type="date" id="dataDeValidade" name="dataDeValidade" value="<?php echo htmlspecialchars($dataDeValidade); ?>" required><br>

        <button type="submit">Cadastrar Produto</button>
    </form>

    <p><a href="listar.php">Voltar para a Lista de Produtos</a></p>