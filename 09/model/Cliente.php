<?php

class Cliente implements JsonSerializable
{
    private ?int $id;
    private string $nome;
    private string $cpf;
    private string $dataNascimento;
    private bool $ativo;

    public function __construct(?int $id, string $nome, string $cpf, string $dataNascimento, bool $ativo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->ativo = $ativo;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getCpf(): string { return $this->cpf; }
    public function getDataNascimento(): string { return $this->dataNascimento; }
    public function getAtivo(): bool { return $this->ativo; }
    
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'dataNascimento' => $this->dataNascimento,
            'ativo' => $this->ativo,
        ];
    }

    
}