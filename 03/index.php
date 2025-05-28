<?php

## Repetições
// FOR
for($i = 1; $i <5; $i++) {
    echo "Funcional $i! <br>";
}

// While
$contador = 1;
while ($contador < 5) {
    echo "Contando: $contador <br>";
    $contador++;
}

// Array
/*
for($i = 0; $i < count($nomes); $i++) {
    echo "Olá, $nomes[$i]! <br>";
}
*/
$nomes = ["Adenilsa", "Carlos", "Gustavo", "Gabriel"];
foreach($nomes as $id) {
    echo "Olá, $n! <br>";
}