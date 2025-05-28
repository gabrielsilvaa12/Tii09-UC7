<?php
$idade = (int) $_GET['idade'];

if ($idade <= 12) {
    echo "Pirralho";
} elseif ($idade <= 18) {
    echo "Adolescente";
} elseif($idade <= 60) {
    echo "Adulto";
} else {
    echo "VELHAÇO";
}
