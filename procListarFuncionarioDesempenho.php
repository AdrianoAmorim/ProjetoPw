<?php

require_once 'conexao.php';

$query= "SELECT f.nome, f.salario, SUM(v.totalbruto) AS totalvendido,
       SUM(v.totalliquido) AS totalefetivo FROM funcionario f
       INNER JOIN empresa e
         ON f.codempresa = e.codempresa
       INNER JOIN venda v
         ON f.codfuncionario = v.codfuncionario
       GROUP BY f.codfuncionario,f.nome,f.salario";

$sql_exec = pg_query($query) or die("ERRO: " . pg_last_error());

echo " <table class='table table-striped'>
                    <tr>

                        <th>Nome</th>
                        <th>Salário</th>
                        <th>Total Vendido</th>
                        <th>Total Efetivo</th>
                    </tr>";


while ($result = pg_fetch_object($sql_exec)) {
    $totalVendido = "R$ ". number_format($result->totalvendido, 2, ",",".");
    $totalEfetivo = "R$ ". number_format($result->totalefetivo, 2, ",",".");
    $salario = "R$ ". number_format($result->salario, 2, ",",".");
    echo" <tr>
                            <td>$result->nome</td>
                            <td>$salario</td>
                            <td>$totalVendido</td>
                            <td>$totalEfetivo</td>
                            
                        </tr>";
}

?>