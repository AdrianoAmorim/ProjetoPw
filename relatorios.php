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
        <title>Usando Bootstrap</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/personalizacao.css" rel="stylesheet" type="text/css"/>
        <script src="js/script.js" type="text/javascript"></script>
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


        <?php
        require_once ('conexao.php');

        $query = "select * from funcionario ORDER BY nome;";
        $queryCargo = "select * from cargo ORDER BY descricao;";
        $sql_exec = pg_query($query) or die("ERRO: " . pg_last_error());
        $sql_exec2 = pg_query($queryCargo) or die("ERRO: " . pg_last_error());
        ?>

        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <!-- Titulo da tabela Funcionarios -->
                <div class="panel panel-default">
                    <div class="panel-body bg-primary">
                        <div class="centralizarTexto">
                            <span class="panel-title">Listagem de Funcionarios </pan>   
                        </div>
                    </div>
                </div>

                <div class="panel" id="opcoesTabela">
                    <div class="form-horizontal">

                        <div class="form-group ">
                            <label for="opcoesTabelaCargo" class="control-label col-xs-12 col-sm-2 col-md-2 col-lg-2">Cargo</label>
                            <div class="col-xs-7 col-sm-3 col-md-2 col-lg-3">
                                <select class="form-control" id="opcoesTabelaCargo" name="opcoesTabelaCargo">
                                    <?php
                                    while ($result1 = pg_fetch_object($sql_exec2)) {
                                        echo "<option> $result1->descricao</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <label for="telCelular" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Status</label>
                            <div class="col-xs-7 col-sm-3 col-md-2 col-lg-3" >
                                <select class="form-control" id="opcoesTabelaCargo" name="opcoesTabelaCargo">
                                    <option>Ativo</option>
                                    <option>Inativo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- TABELA DE LISTAGEM DOS FUNCIONARIOS -->

                <table class="table table-striped">
                    <tr>

                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Empresa</th>
                        <th>Alterar</th>
                    </tr>
                    <?php
                    while ($result = pg_fetch_object($sql_exec)) {
                        $codigo = (($result->codfuncionario * 830) + 9) * (-1);
                        $codCodificado = base64_encode($codigo);
                        ?>
                        <tr>
                            <td><?php echo $result->nome ?> </td>
                            <td><?php echo $result->codcargo ?> </td>
                            <td><?php echo $result->codempresa ?> </td>
                            <td><a href="AlterarFuncionario.php?cod=<?php echo $codCodificado ?>">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </table>
            </div>
        </div>



        <footer class="bgFooter navbar-fixed-bottom">
            <p class="textoBranco centralizarTexto">Todos os Direitos reservados</p>
        </footer>


        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>