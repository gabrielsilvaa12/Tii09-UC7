<?php
require_once __DIR__ . '/../dao/ProdutoDAO.php';
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../core/authService.php';
 

$usuarioLogado = checkLogin(true); 
 

$id = null; 
$nome = '';
$preco = '';
$ativo = 0;
$dataDeCadastro = '';
$dataDeValidade = '';
$mensagemSucesso = '';
$mensagemErro = '';
 
$produtoDao = new ProdutoDAO();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 
    if (!$id) {
        $mensagemErro = "ID do produto não fornecido ou inválido.";
    } else {
        $produto = $produtoDao->getById($id); 
 
        if (!$produto) {
            $mensagemErro = "Produto não encontrado com o ID fornecido.";
        } else {
            $nome = $produto->getNome();
            $preco = $produto->getPreco();
            $ativo = $produto->getAtivo(); 
            $dataDeCadastro = $produto->getDataDeCadastro();
            $dataDeValidade = $produto->getDataDeValidade();
            $id = $produto->getId();
        }
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $ativo = filter_input(INPUT_POST, 'ativo', FILTER_VALIDATE_INT) ? 1 : 0;
    $dataDeCadastro = filter_input(INPUT_POST, 'dataDeCadastro', FILTER_SANITIZE_SPECIAL_CHARS);
    $dataDeValidade = filter_input(INPUT_POST, 'dataDeValidade', FILTER_SANITIZE_SPECIAL_CHARS);
 
    if (!$id || !$nome || $preco === false || !$dataDeCadastro || !$dataDeValidade || $preco <= 0) {
        $mensagemErro = "Por favor, preencha todos os campos obrigatórios corretamente e verifique o ID do produto.";
    } else {
        $produtoAtualizado = new Produto($id, $nome, $preco, (bool)$ativo, $dataDeCadastro, $dataDeValidade);

        if ($produtoDao->update($produtoAtualizado)) {
            $mensagemSucesso = "Produto atualizado com sucesso!";
        } else {
            $mensagemErro = "Erro ao atualizar o produto. Verifique os dados e tente novamente.";
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../css/style.css">  </head>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 500px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="date"] { width: calc(100% - 12px); padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="checkbox"] { margin-right: 5px; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
        .message-success { color: green; font-weight: bold; margin-bottom: 10px; }
        .message-error { color: red; font-weight: bold; margin-bottom: 10px; }
        nav a { margin-right: 15px; }
    </style>
 
    <h1>Editar Produto</h1>
 
    <nav>
        <a href="../index.php">Home</a>
        <a href="listar.php">Lista de Produtos</a>
        <?php if ($id): ?>
            <a href="ver.php?id=<?php echo htmlspecialchars($id); ?>">Ver Detalhes</a>
        <?php endif; ?>
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
 
    <?php if ($id && empty($mensagemErro)): ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
 
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
 
            <button type="submit">Atualizar Produto</button>
        </form>
    <?php elseif (!$id):?>
        <p class="error-message">ID do produto não especificado para edição.</p>
    <?php endif; ?>
 
    <p><a href="listar.php">Voltar para a Lista de Produtos</a></p>
 
</body>
</html>