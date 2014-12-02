<?php

require_once 'conexao.php';


$query = "select EXTRACT(month FROM data) as Mes, Sum(totalliquido) as Soma
  from venda
  WHERE EXTRACT (year FROM data) = 2014 and codfuncionario = 1
  group by mes
  order by mes;";

$query_exec = pg_query($query);

$mes[1] = "Jan";
$mes[2] = "Fev";
$mes[3] = "Mar";
$mes[4] = "Abr";
$mes[5] = "Mai";
$mes[6] = "Jun";
$mes[7] = "Jul";
$mes[8] = "Ago";
$mes[9] = "Set";
$mes[10] = "Out";
$mes[11] = "Nov";
$mes[12] = "Dez";

$dados = "[";

while ($result = pg_fetch_object($query_exec)) {

    $dados .= "['" . $mes[$result->mes] . "'," . $result->soma . "],";
}

$dados .= "]";

echo $dados;
?>
