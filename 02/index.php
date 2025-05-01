<?php
$a = 10;
$b = 5;

echo "Soma: " . ($a + $b) . "<br>";
echo "$a Maior que $b ?" . ($a > $b ? "Sim" : "Não") . "<br>";

$idade = 97;

if ($idade >= 18) {
    echo "Maior de idade, $idade anos! <br>";
} else {
    echo "Menor de idade, $idade anos! <br>";
}

// SWITCH CASE
$dia = "Domingo";

switch ($dia) {
    case "Segunda":
        echo "Inicio da semana";
        break;
    case "Sexta":
        echo "Ultimo dia útil";
        break;
    default:
        echo "Dia comum"; // tipo o else, executa se nenhum case bater
}
