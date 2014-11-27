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
        <style>
            .centralizarTexto{
                text-align: center;
            }
            div.container  div.panel-body > div.centralizarTexto > span {
                font-weight: bold;
                color: black;
            }
        </style>
    </head>

    <body> 

        <div class="container">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-body bg-primary">
                        <div class="centralizarTexto">
                            <span class="panel-title">LOGIN</span>   
                        </div>
                    </div>
                </div>

                <form name="formLogin" method="POST" action="index.php" id="frmLogin" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="login" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Login</label>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <input type="text" class="form-control" name="login" id="login">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senha" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Senha</label>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <form class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="inputEmail">E-mail</label>
                <div class="controls">
                    <input id="inputEmail" type="text" placeholder="Digite o seu e-mail..." />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Senha</label>
                <div class="controls">
                    <input id="inputPassword" type="password" placeholder="Digite a sua senha..." />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox"><input type="checkbox" /> Lembrar senha</label>
                    <button class="btn" type="submit">Acessar</button>
                </div>
            </div>
        </form>

        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>