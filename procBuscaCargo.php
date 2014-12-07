<?php

require_once 'conexao.php';

if ($_GET) {
    $cod = $_GET['codCargo'];
    $descricao = $_GET['nomeCargo'];


    if (empty($cod)) {
        $queryConsulta = "SELECT codcargo,descricao FROM cargo "
                . "WHERE descricao ~* '$descricao'";
    } else if (empty($descricao)) {
        $queryConsulta = "SELECT codcargo,descricao FROM cargo "
                . "WHERE codcargo = $cod";
    } else if (!empty(descricao) && (!empty($cod))) {
        $queryConsulta = "SELECT codcargo,descricao FROM cargo
                WHERE codcargo = $cod OR descricao ~* '$descricao'";
    } if (empty($descricao) && (empty($cod))) {
        echo "<div class='alert alert-danger' role='alert'>Favor Selecionar Um Campo de Pesquisa !!</div>";
    } else {
        $query_exec = pg_query($queryConsulta);

        echo "<div class = 'form-group'>
            <div class = 'col-lg-9'>
            <select class = 'form-control' name = 'buscaCargolistResult' onDblClick= \"carregarDadosCargo()\" multiple size = '8'>";
        while ($result = pg_fetch_object($query_exec)) {
            echo "<option value='$result->codcargo'>$result->descricao</option>";
        }
        echo "</select>
            </div>
           </div>";
    }
}



?>