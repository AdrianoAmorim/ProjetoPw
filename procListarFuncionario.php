<?php

require_once 'conexao.php';

$query = "SELECT f.codfuncionario,f.nome, c.descricao, f.codempresa FROM funcionario f
                  INNER JOIN cargo c ON f.codcargo = c.codcargo 
                 ORDER BY nome;";

$sql_exec = pg_query($query) or die("ERRO: " . pg_last_error());

echo " <table class='table table-striped'>
                    <tr>

                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Empresa</th>
                        <th>Alterar</th>
                    </tr>";


while ($result = pg_fetch_object($sql_exec)) {
    $codigo = (($result->codfuncionario * 830) + 9) * (-1);
    $codCodificado = base64_encode($codigo);

    echo" <tr>
                            <td>$result->nome</td>
                            <td>$result->descricao</td>
                            <td>$result->codempresa</td>
                            <td><a href='AlterarFuncionario.php?cod=$codCodificado'>
                                    <i class='glyphicon glyphicon-pencil'></i>
                                </a>
                            </td>
                        </tr>";
}
?>