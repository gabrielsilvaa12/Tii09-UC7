<?php
require_once 'Contato.php';
require_once 'Database.php';

class ContatoDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
}

public function getAll(): array {
    $stmt = $this->db->query("SELECT * FROM contatos");

    $contatos = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $contatos[] = new Contato($row['id'], $row['nome']);
    }

    return $contatos;
}

public function create(Contato $contato) {  
    $sql = "INSERT INTO contatos (nome) VALUES (:nome)";
    $stmt = $this->db->prepare($sql);
    
    $nome = $contato->getNome();

    $stmt->bindParam(':nome', $nome);
    $stmt->execute();
}
}
?>