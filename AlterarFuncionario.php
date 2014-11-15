<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Cadastro de Funcionário</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/personalizacao.css" rel="stylesheet" type="text/css"/>
    </head>

    <body> 
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Logo</a>
                    </div>

                    <!-- Conteudo da nav bar-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li role="presentation"><a href="index.php">Home</a></li>
                            <li role="presentation"><a href="cadastroFuncionario.php">Cadastro de Funcionario</a></li>
                            <li role="presentation"><a href="#">Administração</a></li>
                            <li role="presentation"><a href="relatorios.php">Relatórios</a></li>
                        </ul>
                    </div>  
                </div>
            </nav> 
        </header>

        <!-- Titulo da pagina -->
        <div class="container">
            <div class="panel bgTitulo panel-default ">
                <div class="panel-body">
                    <div class="centralizarTexto">
                        <span class="panel-title">CADASTRO DE FUNCIONARIO</span>   
                    </div>
                </div>
            </div>
        </div>
        <!-- ---------------------------------------------------------------------------------------------------------------------------- -->
<?php 
require_once 'conexao.php';

$codFuncionario = $_GET['cod'];
$query = "SELECT * FROM funcionario WHERE codfuncionario = $codFuncionario";
$query1 = "SELECT * FROM enderecofuncionario WHERE codfuncionario = $codFuncionario";
$sql_exec = pg_query($query);
$sql_exec1 = pg_query($query1);

$resultado = pg_fetch_object($sql_exec);
$resultado1 = pg_fetch_object($sql_exec1);

?>
        
        <!-- ------------------        FORMULARIO DE CADASTRO--------------------------------------------------------------------------- -->
        <div class="container">
            <form name="formCadFuncionario" action="procCadFuncionario.php" method="POST" class="form-horizontal" role="form">

                <div class="form-group">
                    <label for="codFunc" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código Func</label>
                    <div class="col-xs-7 col-sm-3 col-md-2">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default tiraPadding" type="button">
                                    <a href="#" ><img src="images/iconPqBusca.png" alt="Buscar"/></a>
                                </button>
                            </span>
                            <input type="text" class="form-control" name="codFunc" id="codFunc" valeu="<?php echo $resultado->codfuncionario ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="codEmpresa" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código Empresa</label>
                    <div class="col-xs-7 col-sm-3 col-md-2">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default tiraPadding" type="button">
                                    <a href="#" ><img src="images/iconPqBusca.png" alt="Buscar"/></a>
                                </button>
                            </span>
                            <input type="text" class="form-control" name="codEmpresa" id="codEmpresa" value="<?php echo $resultado->codempresa ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="codCargo" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código Cargo</label>
                    <div class="col-xs-7 col-sm-3 col-md-2">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default tiraPadding" type="button">
                                    <a href="" ><img src="images/iconPqBusca.png" alt="Buscar"/></a>
                                </button>
                            </span>
                            <input type="text" class="form-control" name="codCargo" id="codCargo" value="<?php echo $resultado->codcargo ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nomeFunc" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nome</label>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default tiraPadding" type="button">
                                    <a data-toggle="modal" href="#buscarFunc" role="button"><img src="images/iconPqBusca.png" alt="Buscar"/></a>
                                </button>
                            </span>
                            <input type="text" class="form-control" name="nomeFunc" id="nomeFunc" value="<?php echo $resultado->nome?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="telCelular" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tel Celular</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="tel" class="form-control" name="telCelular" id="telCelular" value="<?php echo $resultado->telcel ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telResidencial" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tel Residencial</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="tel" class="form-control" name="telResidencial" id="telResidencial" value="<?php echo $resultado->telfixo ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpf" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">CPF</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $resultado->cpf ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="rg" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">RG</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="rg" id="rg" value="<?php echo $resultado->rg ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="dtnascimento" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data Nascimento</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="Date" class="form-control" name="dtnascimento" id="dtnascimento" value="<?php echo $resultado->dtnascimento ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cep" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">CEP</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $resultado1->cep ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="logradouro" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Logradouro</label>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $resultado1->logradouro ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="numeroCasa" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nº</label>
                    <div class="col-xs-4 col-sm-2 col-md-1 col-lg-1">
                        <input type="text" class="form-control" name="numeroCasa" id="numeroCasa" value="<?php echo $resultado1->numero ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="complemento" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Complemento</label>
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $resultado1->complemento ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="bairro" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Bairro</label>
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $resultado1->bairro ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cidade" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Cidade</label>
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $resultado1->cidade ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cidade" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">UF</label>
                    <div class="btn-group col-lg-2">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Estado<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">ES</a></li>
                            <li><a href="#">MG</a></li>
                            <li><a href="#">SP</a></li>
                            <li><a href="#">RJ</a></li>
                            <li><a href="#">BA</a></li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label for="salario" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Salário</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="salario" id="salario" value="<?php echo $resultado->salario ?>">
                    </div>
                </div>





                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </div>
            </form>
        </div>




        <!--JANELA DE BUSCA DO FUNCIONARIO - ---------------------------------------------------------------------------------------- -->
        <div class="modal fade" id="buscarFunc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Buscar Funcionário</h4>
                    </div>

                    <div class="modal-body">
                        <button type="button" class="btn btn-primary">Janela Modal</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim JANELA DE BUSCA FUNCIONARIO -->
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
