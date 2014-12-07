<?php

require_once 'conexao.php';
$cargo = $_GET['cargo'];

$query = "SELECT f.nome, f.dtnascimento, f.telcel,f.telfixo FROM funcionario f
            INNER JOIN cargo c ON f.codcargo = c.codcargo 
            WHERE c.descricao = '$cargo'
            ORDER BY nome;";

$sql_exec = pg_query($query) or die("ERRO: " . pg_last_error());

echo " <table class='table table-striped'>
                    <tr>

                        <th>Nome</th>
                        <th>Tel Celular</th>
                        <th>Tel Fixo</th>
                        <th>Data de nascimento</th>
                    </tr>";


while ($result = pg_fetch_object($sql_exec)) {
    $data = date("d/m/Y", strtotime($result->dtnascimento));
    echo" <tr>
                            <td>$result->nome</td>
                            <td>$result->telcel</td>
                            <td>$result->telfixo</td>
                            <td>$data</td>
                           
         </tr>";
}
?>