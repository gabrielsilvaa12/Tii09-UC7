<!--
PHP + HTML

Crie um formulário que permita cadastrar produtos (nome e preço)
Use funções para:
- Inserir os produtos no array
-->
<?php

$produtos = [];

if ($_GET['nome'] && $_GET['preco']) {
    $produtos[] = ['nome' => $_GET['nome'], 'preco' => $_GET['preco']];
}

echo "<ul>";
foreach ($produtos as $produto) {
    echo "<li>{$produto['nome']} - R$ {$produto['preco']}</li>";
}
echo "</ul>";