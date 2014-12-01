<?php

if ($_POST) {
    require_once ('conexao.php');

    $codCargo = $_POST['codCargo'];
    $nomeFunc = $_POST['nomeFunc'];
    $telCel = $_POST['telCelular'];
    $telFixo = $_POST['telResidencial'];
    $salario = $_POST['salario'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $dataNasc = $_POST['dtnascimento'];
    $dataNova = date("Y-m-d", strtotime($dataNasc));
    $logradouro = $_POST['logradouro'];
    $numCasa = $_POST['numeroCasa'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $status = $_POST['status'];



    $query = "INSERT INTO funcionario(codCargo, codEmpresa, nome, telCel, telFixo, salario, status, email, cpf, rg, dtNascimento) "
            . "VALUES ('$codCargo','1','$nomeFunc','$telCel','$telFixo','$salario','$status','$email','$cpf','$rg','$dataNova')";

    $query2 = "INSERT INTO enderecoFuncionario(codCargo, codEmpresa, logradouro, numero, complemento, bairro, cep, cidade, uf) "
            . "VALUES ('$codCargo','1','$logradouro','$numCasa','$complemento','$bairro','$cep','$cidade','$uf');";

    $exec_query = pg_query($query) or die("Erro:" . pg_last_error());
    $exec_query2 = pg_query($query2) or die("Erro:" . pg_last_error());
    header("location: index.php");
} else {
    header("location: cadastroFuncionario.php");
}
?>
