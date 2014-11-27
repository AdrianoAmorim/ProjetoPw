<?php

if($_POST){
require_once 'conexao.php';

$codFuncionario = $_POST['codFunc'];
$codCargo = $_POST['codCargo'];
$nome = $_POST['nomeFunc'];
$telCel = $_POST['telCelular'];
$telFixo = $_POST['telResidencial'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$email = $_POST['email'];
$dtNascimento = date("Y-m-d", strtotime($_POST['dtnascimento']));
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numeroCasa'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$salario = $_POST['salario'];

$query = "UPDATE funcionario SET codCargo = '$codCargo',codEmpresa = 1, nome= '$nome',telcel='$telCel',telfixo='$telFixo',"
        . " cpf='$cpf',rg='$rg',dtnascimento='$dtNascimento',salario='$salario', status='1', email = '$email' WHERE codfuncionario = '$codFuncionario';";

$query2 = "UPDATE enderecofuncionario SET codCargo = '$codCargo',codEmpresa = '1',logradouro='$logradouro',numero='$numero',complemento='$complemento',"
        . " bairro= '$bairro', cep='$cep', cidade='$cidade', uf='$uf' WHERE codfuncionario = '$codFuncionario';";

$exec_query = pg_query($query) or die("Erro na Alteração de Funcionario ". pg_last_error());
$exec_query = pg_query($query2) or die("Erro na Alteração de Funcionario ". pg_last_error());

header("location: index.php");
}else{
    header("location: relatorios.php");
}
    


?>