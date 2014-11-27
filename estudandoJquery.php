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

    </head>

    <body id="tudo"> 
        <div class="container">


            <div class="col-xs-12">
                <h1>Consultar CEP</h1>
                <hr />

                <div class="input-group">
                    <input type="text" class="form-control" name="cep" id="txtCep" required>
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="btnBuscarCep" type="button">Buscar</button>
                    </span>
                </div>
                <p id="dadosCep">
                    <span>cep <b></b></span><br>
                    <span>Logradouro <b></b></span><br>
                    <span>Bairro <b></b></span><br>
                    <span>Cidade/UF <b></b></span><br>
                </p>


            </div>


        </div>
        <script>
            $(#btnBuscarCep).click(function (){
            var url = "http://apps.widenet.com.br/busca-cep/api/cep/" +
                    $(#txtCep).val() + ".json";
                    $.getJSON((url, function (data) {
                        $("#dadosCep span b:eq(0)").html(data.code);
                        $("#dadosCep span b:eq(1)").html(data.address);
                        $("#dadosCep span b:eq(2)").html(data.district);
                        $("#dadosCep span b:eq(3)").html(data.city + "/" + data.state);
                    }));
            })
        </script>


        <script src="js/bootstrap.min.js"></script>
    </body>
</html>