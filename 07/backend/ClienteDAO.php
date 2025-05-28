<?php

require_once 'Cliente.php';
require_once 'Database.php';

class ClienteDAO {
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getAll(): array{
        $resultadoDoBanco = $this->db->query("SELECT * FROM clientes");
        $clientes = [];

        while($row = $resultadoDoBanco->fetch(PDO::FETCH_ASSOC)){
            $clientes[] = new Cliente (
                $row['id'],
                $row['nome'],
                $row['cpf'],
                $row['ativo'],
                $row['dataNascimento']
        );
    }

    return $clientes;
}

public function getById(int $id): ?Cliente{
    $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) {
        return new Cliente(
            $row['id'],
            $row['nome'],
            $row['cpf'],
            $row['ativo'],
            $row['dataNascimento']
        );
    }
    return null;
}

public function create(Cliente $cliente): void{
    $stmt = $this->db->prepare('INSERT INTO clientes (nome, cpf, ativo, dataNascimento) VALUES (:nome, :cpf, :ativo, :dataNascimento)');
    $stmt->execute([
        'nome'=> $cliente->getNome(),
        'cpf' => $cliente->getCpf(),
        'ativo' => $cliente->getAtivo(),
        'dataNascimento'=> $cliente->getdataNascimento()
    ]);
}

public function update(Cliente $cliente): void{
    $stmt = $this->db->prepare('UPDATE clientes SET nome = :nome, cpf = :cpf, ativo = :ativo, dataNascimento = :dataNascimento WHERE id = :id');
    $stmt->execute([
        'id' => $cliente->getId(),
        'nome'=> $cliente->getNome(),
        'cpf' => $cliente->getCpf(),
        'ativo' => $cliente->getAtivo(),
        'dataNascimento'=> $cliente->getdataNascimento()
    ]);
}

public function delete(int $id): void {
    $stmt = $this->db->prepare('DELETE FROM clientes WHERE id = :id');
    $stmt->execute(['id' => $id]);
}
}