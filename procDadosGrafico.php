<?php

require_once 'conexao.php';


$query = "select EXTRACT(month FROM data) as Mes, Sum(totalliquido) as Soma
  from venda
  WHERE EXTRACT (year FROM data) = 2014
  group by mes
  order by mes;";

$query_exec = pg_query($query);

while ($resultArray = pg_fetch_array($query_exec,null,PGSQL_NUM)) {
   $arrayTotal[] = $resultArray[$i];
   $i++;
   
}
print_r($arrayTotal);
?>
