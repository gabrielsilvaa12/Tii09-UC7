<table border="1">
    <tr>
        <th>Nome</th>
        <th>Cpf</th>
        <th>Cidade</th>
    </tr>
    <?php
    /*
Crie um array multidimensional com 2 clientes, cada um contendo:
- nome
- cpf
- cidade
*/

    $clientes = [
        [
            "nome" => "Douglas",
            "cpf" => "987654321-10",
            "cidade" => "Sampa meo"
        ],

        [
            "nome" => "Brigael",
            "cpf" => "123456789-20",
            "cidade" => "Sampa meo"
        ],
    ];
    foreach ($clientes as $id) {
        echo "
            <tr>
                <td>{$id["nome"]}</td>
                <td>{$id["cpf"]}</td>
                <td>{$id["cidade"]}</td>
        ";
    }
    ?>
</table>