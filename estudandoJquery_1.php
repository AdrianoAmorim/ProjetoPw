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
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
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

        <h1>Usando JQuery</h1>

        <ul>
            <li>
                <header>Titulo 1</header>
                <p class="oculto">

                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    <a>Ocultar</a>
                </p>
            </li>
            <li>
                <header>Titulo 2</header>
                <p class="oculto">
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                </p>
            </li>
            <li>
                <header>Titulo 3</header>
                <p class="oculto">

                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj
                    asdasd ad as das d asd asdasdaadasdasdadadasdasdasdasfsdfhsdfbjshdfgj

                </p>
            </li>
        </ul>

        <script>
            $(document).ready(function () {
                $("p").hide();
                $("p.oculto > a").css("cursor", "pointer");

            });

            $("header").click(function () {
                $(this).next().slideDown();

            });
            $("a").click(function () {
                $(this).parent().slideUp();
            });


        </script>

    </body>
</html>