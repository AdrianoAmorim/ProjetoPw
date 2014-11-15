<?php

require_once ('conexao.php');

if($_POST){
    $codFunc =$_POST['codFunc'] ;
    $codEmpresa =$_POST['codEmpresa'] ;
    $codCargo = $_POST['codCargo'] ;
    $nomeFunc = $_POST['nomeFunc'];
    $telCel = $_POST['telCelular'];
    $telResidencia = $_POST['telResidencial'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['cpf'];
    $dataNasc = $_POST['dtnascimento'];
    $dataNova = date("Y-m-d",strtotime($dataNasc));
    $logradouro = $_POST['logradouro'];
    $numCasa = $_POST['numeroCasa'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $salario = $_POST['salario'];
           
    
    $query = "INSERT INTO funcionario VALUES ('$codFunc','$codCargo','$codEmpresa','$nomeFunc','$telResidencia','$telCel',"
            . "'$cpf','$rg','$dataNova','$salario','1');";
    $query2 = "INSERT INTO enderecoFuncionario VALUES ('$codFunc','$codCargo','$codEmpresa','$logradouro','$numCasa','$complemento',"
            . "'$bairro','$cep','$cidade','ES');";
    $exec_query = pg_query($query) or die ("Erro:" . pg_last_error());
    $exec_query2 = pg_query($query2) or die ("Erro:" . pg_last_error());
    header("location: index.php");
    
}else{
    header("location: cadastroFuncionario.php");
}
?>
