<?php

$produtos = [
    ["nome" => "Pão", "preco" => 1.50],
    ["nome" => "Café", "preco" => 3.00],
    ["nome" => "Leite", "preco" => 4.80]
];

function calcularTotalProdutos(array $itens): float
{
    $total = 0;

    foreach ($itens as $item) {
        $total += $item['preco'];
    }
    return $total;
}

echo "Total: R$ " . number_format(calcularTotalProdutos($produtos), 2, ',', '.');

function menorPreco(array $menor): float
{
    $maisBarato = $menor[0];

    foreach ($menor as $id) {
        if($id["preco"] < $maisBarato) {
            $maisBarato = $id["preco"];
        }
        
    }
    return $maisBarato;
}

echo "<br> menor preço: R$ " . number_format(menorPreco($produtos), 2, ',', '.');