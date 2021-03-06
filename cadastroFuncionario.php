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
                        <a class="navbar-brand" href="index.php">SGV</a>
                    </div>

                    <!-- Conteudo da nav bar-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li role="presentation"><a href="index.php">Home</a></li>
                            <li role="presentation"><a href="cadastroFuncionario.php">Cadastro de Funcionario</a></li>
                            <li role="presentation"><a href="administracao.php">Administração</a></li>
                            <li role="presentation"><a href="relatorios.php">Relatórios</a></li>
                        </ul>
                    </div>  
                </div>
            </nav> 
        </header>
        <!-- Titulo da pagina -->
        <div class="container">
            <div class="panel panel-default ">
                <div class="panel-body bg-primary">
                    <div class="centralizarTexto">
                        <span class="panel-title textoBranco">CADASTRO DE FUNCIONARIO</span>   
                    </div>
                </div>
            </div>
        </div>
        <!-- ---------------------------------------------------------------------------------------------------------------------------- -->

        <!-- ------------------        FORMULARIO DE CADASTRO--------------------------------------------------------------------------- -->
        <div class="container" id="containerPrincipal">
            <form name="formCadFuncionario" action="procCadFuncionario.php" method="POST" class="form-horizontal" role="form">
                <input type="hidden" class="form-control" name="codFunc">
                <div class="form-group">
                    <label for="codCargo" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código Cargo</label>
                    <div class="col-xs-7 col-sm-3 col-md-2">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default tiraPadding" type="button">
                                    <a href="javascript:habilitarBuscaCargo()" ><img src="images/iconPqBusca.png" alt="Buscar"/></a>
                                </button>
                            </span>
                            <input type="text" class="form-control" name="codCargo" id="codCargo" required>
                        </div>
                    </div>
                </div>

                <!-- BUSCAR CARGOS CADASTRADOS -->
                <div id="buscarCargo" class="row">
                    <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-md-5 col-lg-5">
                        <div class="bgVerdeClaro well" >
                            <div class="form-group">
                                <div class="col-xs-10 col-sm-4 col-md-3 col-lg-3">
                                    <input type="text" class="form-control" name="codBuscarCargo" placeholder="Codigo" >
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-6">
                                    <input type="text" class="form-control" name="nomeBuscarCargo" placeholder="Nome do Funcionario" >
                                </div>

                                <div class="col-lg-3">
                                    <input type="button" class="btn textoBranco bgBtnLilas " onclick="procBuscaCargo()" value="Pesquisar" />
                                </div>
                            </div>

                            <div id="resultBuscaCargo">

                            </div>

                        </div>
                    </div>
                </div>  
                <!-- FIM BUSCAR CARGOS CADASTRADOS -->


                <div class="form-group">
                    <label for="nomeFunc" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nome</label>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default tiraPadding" type="button">
                                    <a href="javascript:habilitarBuscaFuncionario();" role="button"><img src="images/iconPqBusca.png" alt="Buscar"/></a>
                                </button>
                            </span>
                            <input type="text" class="form-control" name="nomeFunc" id="nomeFunc" maxlength="45" required>
                        </div>
                    </div>
                </div>

                <!-- DIV DE BUSCAR FUNCIONARIO  --------- -  -- ------------------------------------- -->
                <div id="buscarFuncionario" class="row">
                    <div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-md-5 col-lg-5">
                        <div class="bgVerdeClaro well" >
                            <div class="form-group">
                                <div class="col-xs-10 col-sm-4 col-md-3 col-lg-3">
                                    <input type="text" class="form-control" name="codBuscarFunc" placeholder="Codigo" >
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-6">
                                    <input type="text" class="form-control" name="nomeBuscarFunc" placeholder="Nome do Funcionario" >
                                </div>

                                <div class="col-lg-3">
                                    <input type="button" class="btn textoBranco bgBtnLilas " onclick="procBuscaFuncionario()" value="Pesquisar" />
                                </div>
                            </div>

                            <div id="resultBuscaFuncionario">

                            </div>

                        </div>
                    </div>
                </div>
                <!-- FIM DIV BUSCAR FUNCIONARIO - ----------------------------- -->


                <div class="form-group">
                    <label for="telCelular" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tel Celular</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2" >
                        <input type="tel" class="form-control" name="telCelular" id="telCelular" maxlength="20">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telResidencial" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tel Residencial</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="tel" class="form-control" name="telResidencial" id="telResidencial" maxlength="20">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">E-mail</label>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                        <input type="email" class="form-control" name="email" id="email" maxlength="45" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpf" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">CPF</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="cpf" id="cpf" maxlength="15" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="rg" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">RG</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="rg" id="rg" maxlength="15" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dtnascimento" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data Nascimento</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="Date" class="form-control" name="dtnascimento" id="dtnascimento"  required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cep" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">CEP</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="cep" id="cep" maxlength="8"  required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="logradouro" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Logradouro</label>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <input type="text" class="form-control" name="logradouro" id="logradouro" maxlength="45" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="numeroCasa" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nº</label>
                    <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="numeroCasa" id="numeroCasa"required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="complemento" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Complemento</label>
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" class="form-control" name="complemento" maxlength="45" id="complemento">
                    </div>
                </div>

                <div class="form-group">
                    <label for="bairro" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Bairro</label>
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" class="form-control" name="bairro" id="bairro" maxlength="45" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cidade" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Cidade</label>
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" class="form-control" name="cidade" id="cidade" maxlength="45" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cidade" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">UF</label>
                    <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2">
                        <select class="form-control" id="uf" name="uf" required>
                            <option value="RJ">RJ</option>
                            <option value="ES">ES</option>
                            <option value="MG">MG</option>
                            <option value="SP">SP</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="salario" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Salário</label>
                    <div class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
                        <input type="text" class="form-control" name="salario" id="salario" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-xs-3 col-sm-2 col-md-2 col-lg-2 control-label">Status</label>
                    <div class="col-xs-6 col-lg-3">
                        <div class="checkbox">
                            <label>
                                <input name="status" id="t" type="radio" value="T"> Ativo
                            </label>
                            <br />
                            <label>
                                <input name="status" id="f" type="radio" value="F"> Inativo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn textoBranco bgBtnLilas" id="btnCadAlt" value="Cadastrar"/>
                    </div>
                </div>
            </form>
        </div>

        <footer class="bgFooter navbar-fixed-bottom">
            <p class="textoBranco centralizarTexto">SISTEMA DE GERENCIAMENTO DE VENDAS</p>
        </footer>

        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
