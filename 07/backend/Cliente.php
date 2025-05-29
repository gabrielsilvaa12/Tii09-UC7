<?php

class Cliente {
    private ?int $id;
    private string $nome;
    private string $cpf;
    private bool $ativo;
    private string $dataNascimento;

    public function __construct(?int $id, string $nome, string $cpf, bool $ativo, string $dataNascimento) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->ativo = $ativo;
        $this->dataNascimento = $dataNascimento;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function getAtivo(): bool {
        return $this->ativo;
    }

    public function getDataNascimento(): ?string {
        return $this->dataNascimento;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function setAtivo(bool $ativo): void {
        $this->ativo = $ativo;
    }
    public function setDataNascimento(string $dataNascimento): void {
        $this->setDataNascimento($dataNascimento); // <- chama ele mesmo, pra sempre (loop infinito)
    }
    
}