<?php

class Pizza {
    private int $id;
    private string $sabor;
    private string $tamanho;
    private float $preco;

    public function __construct($id, string $sabor, string $tamanho, float $preco)
    {
        $this->id = $id;
        $this->sabor = $sabor;
        $this->tamanho = $tamanho;
        $this->preco = $preco;
    }

    public function getId(): float { return $this->id; }
    public function getSabor(): float { return $this->sabor; }
    public function getTamanho(): float { return $this->tamanho; }
    public function getPreco(): float { return $this->preco; }

    public function setPreco(float $novoPreco): void {
        if ($novoPreco > 0) {
        $this->preco = $novoPreco;
        }
    }

    public function __toString()
    {
        return "Pizza de $this->sabor e preco $this->preco";
    }
}
