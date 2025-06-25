<?php

class Cidade {
    public $id;
    public $nome;
    public Estado $estado;

    public function __construct($id, $nome, $estado) {
        $this->id = $id;
        $this->nome = $nome;
        $this->estado = $estado;
    }
}

class Estado {
    public $id;
    public $uf;

    public function __construct($id, $uf) {
        $this->id = $id;
        $this->uf = $uf;
    }
}

$bahia = new Estado(17, 'BA');
$minas = new Estado(22, 'MG');

$salvador = new Cidade(1, 'salvador', $bahia);
print_r($salvador);