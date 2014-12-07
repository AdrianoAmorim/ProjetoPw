<?php

require_once 'conexao.php';

$status = $_GET['status'];

$query = "SELECT f.nome,f.telfixo,f.telcel,f.salario FROM funcionario f
inner join enderecofuncionario e on f.codfuncionario = e.codfuncionario
                WHERE f.status = '$status'";

$sql_exec = pg_query($query) or die("ERRO: " . pg_last_error());

echo " <table class='table table-striped'>
                    <tr>

                        <th>Nome</th>
                        <th>Tel Celular</th>
                        <th>Tel Fixo</th>
                        <th>Salário</th>
                    </tr>";

while ($result = pg_fetch_object($sql_exec)) {
    $salario = "R$ ". number_format($result->salario, 2, ",",".");
    echo" <tr>
                            <td>$result->nome</td>
                            <td>$result->telcel</td>
                            <td>$result->telfixo</td>
                            <td>$salario</td>
                           
         </tr>";
}
?>