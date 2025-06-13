<?php

require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../core/Database.php';

class UusarioDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create (Usuario $usuario):bool {
        $sql = "INSERT INTO usuario (nome, senha, email, token) VALUES (:nome, :senha, :email, :token)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome' => $usuario->getNome(),
            ':senha' => $usuario->getSenha(),
            ':email' => $usuario->getEmail(),
            ':token' => $usuario->getToken(),
        ]);
    }

    public function getByEmail(string $email):?Usuario {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch();

        return $data ?
            new Usuario($data['id'], $data['nome'], $data['senha'], $data['email'], $data['token'])
            : null;
    }

    public function getByToken(string $token):?Usuario {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE token = :token");
        $stmt->execute([':token' => $token]);
        $data = $stmt->fetch();

        return $data ?
            new Usuario($data['id'], $data['nome'], $data['senha'], $data['email'], $data['token'])
            : null;
    }

    public function updateToken(int $id, ?string $token): bool
    {
        $sql = "UPDATE usuario SET token = :token WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':token' => $token,
            ':id' => $id
        ]);
    }
}