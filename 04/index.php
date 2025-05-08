<?php

function saudacao() {
    echo "Bem vindo ao sistema! <br>";
}
saudacao();

function somar ($a, $b) {
    return $a + $b;
}
echo "Retorno da soma: " . somar(12, 14) . "<br>";

function subtrair(int $a, int $b) {
    return $a - $b;
}
echo "Retorno da subtração: " . subtrair(12, 4) . "<br>";

function multiplicar(float $a,float $b): int {
    return $a * $b;
}
echo "Retorno da multiplicação: " . multiplicar(12.7, 4.5) . "<br>";

function dividir(int $a, int $b): float | string{
    if($b == 0) {
        return "Impossivel dividir por zero mano";
    }
    return $a / $b;
}
echo "Retorno da multiplicação: " . dividir(10, 0) . "<br>";
?>

<?php

function listarNomes(array $nomes): void {
    foreach($nomes as $nome) {
        echo "<li>$nome</li>";
    }
}
$nomes = ["Brigael", "Lucas", "Cassio", "Afonso"];
listarNomes($nomes);
?>