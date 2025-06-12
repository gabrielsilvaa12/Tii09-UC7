<?php
session_start(); 

if (!isset($_SESSION['token'])) {
    header('Location: login.php'); 
    exit(); 
}
?>

    <h1>Bem-vindo à área protegida!</h1>
    <p><a href="login.php">Sair</a></p>