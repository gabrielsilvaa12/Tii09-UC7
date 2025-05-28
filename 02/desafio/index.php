<?php

$salario = (float) $_GET['salario'];
$desc = $salario * 0.11;
$valorDescontado = $salario - $desc;

echo $salario . "<br>";
echo $desc . "<br>";
echo $valorDescontado . "<br>";