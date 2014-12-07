<?php

require_once 'conexao.php';

if ($_GET) {
    $cod = $_GET['codFunc'];
    $nomeFunc = $_GET['nomeFunc'];


    if (empty($cod)) {
        $queryConsulta = "SELECT codfuncionario, nome FROM funcionario "
                . "WHERE nome ~* '$nomeFunc'";
    } else if (empty($nomeFunc)) {
        $queryConsulta = "SELECT codfuncionario, nome FROM funcionario "
                . "WHERE codfuncionario = $cod";
    } else if (!empty($nomeFunc) && (!empty($cod))) {
        $queryConsulta = "SELECT codfuncionario, nome FROM funcionario
                WHERE codfuncionario = $cod OR nome ~* '$nomeFunc'";
    } if (empty($nomeFunc) && (empty($cod))) {
        echo "<div class='alert alert-danger' role='alert'>Favor Selecionar Um Campo de Pesquisa !!</div>";
    } else {
        $query_exec = pg_query($queryConsulta);

        echo "<div class = 'form-group'>
            <div class = 'col-lg-9'>
            <select class = 'form-control' name = 'buscaFuncionariolistResult' onDblClick= \"carregarDadosFuncionario()\" multiple size = '8'>";
        while ($result = pg_fetch_object($query_exec)) {
            echo "<option value='$result->codfuncionario'>$result->nome</option>";
        }
        echo "</select>
            </div>
           </div>";
    }
}
?>