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
        <title>Inicio</title>
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
                            <li role="presentation"><a href="administracao.php">Administração</a></li>
                            <li role="presentation"><a href="relatorios.php">Relatórios</a></li>
                        </ul>
                    </div>  
                </div>
            </nav> 
        </header>
        <?php
        require_once 'conexao.php';

        $query = "select f.nome ,count(*) as qtd,  sum(v.totalliquido) as Soma
                 from venda v
                 inner join funcionario f on v.codfuncionario = f.codfuncionario
                 group by f.nome
                 order by soma desc; ";

        $query_exec = pg_query($query);
        ?>
        <div class="container">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <!-- Titulo da tabela de Funcionario/Venda -->
                <div class="panel panel-default">
                    <div class="panel-body bg-primary">
                        <div class="centralizarTexto">
                            <span class="panel-title">Resumo de Vendas</pan>   
                        </div>
                    </div>
                </div>
                <!-- FIM TITULO DA TABELA DE FUNCIONARIO/VENDA -->

                <div class="bgVerdeClaro panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="dtnascimento" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data </label>
                            <div class="col-xs-7 col-sm-3 col-md-2 col-lg-6">
                                <input type="Date" class="form-control" name="dtnascimento" id="dtnascimento">
                            </div>
                        </div>
                    </div>
                </div>


                <table class="table table-striped">

                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Venda Total</th>    
                        <th>Opcao</th>    
                    </tr>

                    <?php
                    while ($Result = pg_fetch_object($query_exec)) {
                        ?>
                        <tr>
                            <td><?php echo "$Result->nome" ?></td>
                            <td><?php echo "$Result->qtd" ?></td>
                            <td><?php echo "$Result->soma" ?></td>
                            <td><a href="#">Mensal</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="col-md-offset-7 col-lg-offset-7">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="container" style=" height: 400px;">

                        </div>
                    </div>
                </div>
            </div>
            
            
            <div id="tudo"></div>
        </div>

        <footer class="bgFooter panel-footer">
            <p class="textoBranco centralizarTexto">Todos os Direitos reservados</p>
        </footer>

        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/js/highcharts.js"></script>
        <script src="js/js/modules/exporting.js"></script>
    </body>
</html>