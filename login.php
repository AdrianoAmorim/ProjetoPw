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
        <title>LOGIN</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/personalizacao.css" rel="stylesheet" type="text/css"/>
        <link href="css/estiloLogin.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </head>

    <body > 
      <!--  <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">

                        <a class="navbar-brand" href="#">SGV</a>
                    </div>     
                </div>
            </nav> 
        </header> -->

        <div class="container tituloLogin" id="fade">
            <div class="panel panel-default bg-info">
                <div class="panel-body">
                    <div class="centralizarTexto">
                        <span class="panel-title textoBranco">ACESSO</span>   
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="fade">
            <form class="form-signin" method="POST" action="validarLogin.php" role="form"  >
                <label for="login" class="sr-only">Login</label>
                <input type="text" id="login" class="form-control" placeholder="Login" required autofocus>

                <label for="senha" class="sr-only">Senha</label>
                <input type="password" id="senha" class="form-control" placeholder="Senha" required>

                <div class=" form-group col-xs-offset-9 col-sm-offset-10 col-md-offset-10 col-lg-offset-10">
                    <button class="btn btnLogin" type="submit">Logar</button>      
                </div>
            </form>

        </div>

    </body>
</html>