<?php

require_once 'conexao.php';
//pega a data da funcao .get do JAvascript
$dataIni = trim($_GET['dataInicial']);
$dataFim = trim($_GET['dataFinal']);
$dataConvertidaIn = date("Y-m-d", strtotime($dataIni));
$dataConvertidaFim = date("Y-m-d", strtotime($dataFim));

//se a data for vazia pega a data do sistema e carrega com o dia Atual a tabela
if ($dataIni == 0 && $dataFim == 0) {
    $dataAtual = date("d-m-Y");
    $dataConvertida = date("Y-m-d", strtotime($dataAtual));

    $query = "select f.codfuncionario , f.nome ,count(*) as qtd,  sum(v.totalliquido) as Soma
                 from venda v
                 inner join funcionario f on v.codfuncionario = f.codfuncionario
                 where v.data = '$dataConvertida'
                 group by f.nome, f.codfuncionario 
                 order by soma desc;";
}
//senao pega a data escolhida pelo usuario e faz a consulta
else {

    $query = "select f.codfuncionario , f.nome ,count(*) as qtd,  sum(v.totalliquido) as Soma
                 from venda v
                 inner join funcionario f on v.codfuncionario = f.codfuncionario
                 where v.data between '$dataConvertidaIn' and '$dataConvertidaFim'
                 group by f.nome, f.codfuncionario 
                 order by soma desc; ";
}

//execulta a consulta
$query_exec = pg_query($query);

//se tiver algum retorno a consulta cria a tabela com o resultado
if (pg_num_rows($query_exec) != 0) {
    echo "<table class = \"table table-striped\">

<tr>
<th>Nome</th>
<th>Quantidade</th>
<th>Venda Total</th>
<th>Opcao</th>
</tr>";
    while ($result = pg_fetch_object($query_exec)) {
        echo "<tr>
<td> $result->nome</td>
<td> $result->qtd</td>
<td> $result->soma</td>
<td><a href=\"javascript:procDadosGrafico($result->codfuncionario)\">Mensal</a></td>
</tr>";

    }
    echo "</table>";
}
//se nao da a mensagem q nao contem vendas
else {
    echo "<div class='alert alert-danger' role='alert'>"
    . "Não Foi Encontrado Ocorrencias de vendas</div>";
}
?>
