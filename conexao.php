<?php

$db = "projetopw";
$usuario = "postgres";
$senha = "cea016";
$servidor = "localhost";

$con = pg_connect("host=$servidor port=5432 dbname=$db user=$usuario password=$senha")
        or die ("Erro na conexão do Banco.");

?>

