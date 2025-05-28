<?php

class Contato 
{
    private ?int $id;
    private string $nome;
    private string $telefone;
    private string $email;
    private ?string $endereco;

    public function __construct(
        ?int $id, 
        string $nome, 
        string $telefone, 
        string $email, 
        ?string $endereco = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->endereco = $endereco;
    }

    // Buscar Valores
    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getTelefone(): string { return $this->telefone; }
    public function getEmail(): string { return $this->email; }
    public function getEndereco(): ?string { return $this->endereco; }

    // Inserir Valores
    public function setNome(string $novoNome) 
    { 
        $this->nome = $novoNome; 
    }
}