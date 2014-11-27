<?php

require_once 'conexao.php';

$query = "select f.codfuncionario, f.nome ,count(*) as qtd,  sum(v.totalliquido) as Soma
                 from venda v
                 inner join funcionario f on v.codfuncionario = f.codfuncionario
                 group by f.nome, f.codfuncionario
                 order by soma desc; ";

$query_exec = pg_query($query);

echo "<table class = \"table table-striped\">

<tr>
<th>Nome</th>
<th>Quantidade</th>
<th>Venda Total</th>
<th>Opcao</th>
</tr>";



while ($result = pg_fetch_object($query_exec)) {
$codigo = (($result->codfuncionario * 830) + 9) * (-1);
$codCodificado = base64_encode($codigo);

    
 echo "<tr>
<td> $result->nome</td>
<td> $result->qtd</td>
<td> $result->soma</td>
<td><a href=\"#\">Mensal</a></td>
</tr>";
}
echo "</table>";
?>
