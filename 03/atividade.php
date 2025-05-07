<ul>
    <?php
    /*
Crie um array com 4 nomes de alunos e exiba-os em uma lista <ul>
no navegador
*/
    $nomes = ["Lucas", "Brigael", "Aécio", "Carlos"];
    foreach ($nomes as $n) {
        echo "<li>Olá, $n! </li> <br>";
    }
    ?>
</ul>