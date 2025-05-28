<?php

/*
- Cliente
Propriedades: nome, veiculo, telefone (todos private string)
Construtor que recebe todas as propreidades
Sobrescreva __toString() para visualizarmos os dados
Crie um get para o "nome" e um set para o "telefone"
*/

class Cliente {
    private string $nome;
    private string $veiculo;
    private string $telefone;

    public function __construct(string $nome, string $veiculo, string $telefone)
    {
        $this->nome = $nome;
        $this->veiculo = $veiculo;
        $this->telefone = $telefone;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function __toString(): string {
        return "Nome: {$this->nome}\nVeículo: {$this->veiculo}\nTelefone: {$this->telefone}";
    }
}

$cliente = new Cliente("Maria", "HB20", "(11) 91234-5678");
echo $cliente;

// Alterar telefone
$cliente->setTelefone("(11) 99999-0000");
echo "\n\nDepois da alteração:\n";
echo $cliente;
