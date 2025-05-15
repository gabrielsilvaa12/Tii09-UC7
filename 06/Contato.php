<?php

class Contato {
    private ?int $id;
    private string $nome;

    public function __construct(?int $id, string $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }
}

$cont1 = new Contato(1, "Oruam");
print_r($cont1);

print_r($cont1);
echo "<br>";
echo $cont1->getNome();
echo "<br>";
$cont1->setNome("Beltrano");
echo $cont1->getNome();
echo "<br>";