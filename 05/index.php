<?php

class Produto {
    private string $nome;
    private float $preco;

    public function __construct(string $nome, float $preco)
    {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function setNome(string $nome) {
        if(strlen($nome) > 2) {
            $this->nome = $nome;
        }
    }

    public function setPreco(float $preco) {
        if ($preco >= 0) {
            $this->preco = $preco;
        } else {
            throw(new Error("Invalid Name"));
        }
    }
    
}


$p1 = new Produto('Abobora', 5.2);
print_r($p1);

echo "<br>";
echo ($p1->getNome());
echo "<br>";
echo ($p1->setNome("Abóbora"));
echo "<br>";
echo ($p1->getNome() . " - " . $p1->getPreco());


// $nome = 'Abobora';
// $preco = 5.2;

// $produtos[] = ['nome' => $nome, 'preco' => $preco];

// $nome2 = 'Batata';
// $preco2 = 6.0;

// $produtos[] = ['nome' => $nome2, 'preco' => $preco2];

// $nome3 = 'Cebola';
// $preco3 = 4.5;
// $peso = 2;

// $produtos[] = ['nome' => $nome3, 'preco' => $preco3, 'peso' => $peso];

// echo "<pre>";
// print_r($produtos);
// echo "</pre>";