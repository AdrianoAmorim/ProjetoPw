<?php

require_once 'conexao.php';
header("content-type:application/json");

if ($_GET) {
    $codFunc = $_GET['cod'];

    $queryBuscaFunc = "SELECT * FROM funcionario f
                    INNER JOIN enderecofuncionario e on f.codfuncionario = e.codfuncionario
                    WHERE f.codfuncionario = $codFunc";

    $query_exec = pg_query($queryBuscaFunc);

    $dados = "";

    $result = pg_fetch_object($query_exec);
    $codCargo = (string) $result->codcargo;
    $codFuncionario = (string) $result->codfuncionario;
 
    
    $dados .= "{\"codFunc\":\"$codFuncionario\","
            . "\"codCargo\":\"$codCargo\","
            . "\"nome\":\"$result->nome\","
            . "\"telFixo\":\"$result->telfixo\","
            . "\"telCel\":\"$result->telcel\","
            . "\"cpf\":\"$result->cpf\","
            . "\"rg\":\"$result->rg\","
            . "\"dtNascimento\":\"$result->dtnascimento\","
            . "\"salario\":\"$result->salario\","
            //. "\"status\":\"$result->status\","
            . "\"email\":\"$result->email\"}"
    ;
    echo $dados;
}
?>