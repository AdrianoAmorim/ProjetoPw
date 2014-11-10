<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!--[if gte IE 9]>
          <style type="text/css">
            .gradient {
               filter: none;
            }
          </style>
        <![endif]-->
        <title>Gestão Empresarial</title>
        <meta charset="UTF-8">
        <link href="estilo.css" rel="stylesheet" type="text/css"/>
        <script src="script.js" type="text/javascript"></script>
    </head>
    <body>
        <header class="Cabecalho gradienteRoxo-Lilas">
            <div class="centralizar">
                <span id="bemVindo">Bem vindo usuário</span>
                <div class="limparFloat"></div>

                <nav>
                    <ul class="menu">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="cadastroFuncionario.php">Cadastro de Funcionário</a></li>
                        <li><a href="#">Cadastro de Fornecedor</a></li>
                        <li><a href="#">Relatórios</a></li>
                        <li><a href="#">Filiais</a></li>
                        <li class="ultimo"><a href="#">Administração</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="centralizar">
            <div class="bgTituloConteudo">
                <h3 class="tituloConteudo">Cadastro de Funcionário</h3>
                <div class="logoTituloConteudo">
                    <img src="img/Funcionario.png" alt="logo Titulo"/>
                </div>

            </div>

            <section class="conteudo centralizar">
                <aside class="barraEsquerda">

                </aside>

                <form name="formCadFuncionario" method="POST" action="procCadFuncionario.php" class="formularios">
                    <label for="codFunc" class="labelCampo">Cod Func: </label>
                    <input type="text" name="codFunc" value="" id="codFunc" class="campoValores inCodEmpresa"/><br> 

                    <label for="codEmpresa" class="labelCampo">Cod Empresa: </label>
                    <input type="text" name="codEmpresa" value="" id="codEmpresa" class="campoValores inCodEmpresa"/><br> 

                    <label for="codCargo" class="labelCampo">Cod Cargo: </label>
                    <input type="text" name="codCargo" value="" id="codCargo" class="campoValores inCodCargo" /><br>

                    <label for="nomeFunc" class="labelCampo">Nome:
                        <img src="img/buscarNovo02.png" id="iconBuscarNome"/></label>
                    <input type="text" name="nomeFunc" value="" id="nomeFunc"  class="campoValores inNomeFunc" /><br>

                    <label for="telCelular" class="labelCampo">Tel Celular: </label>
                    <input type="text" name="telCelular" value="" id="telCelular" class="campoValores inTelCel" />

                    <label for="telResidencial" class="labelCampo">Tel Residencial: </label>
                    <input type="text" name="telResidencial" value="" id="telResidencial" class="campoValores inTelRes" /><br>

                    <label for="cpf" class="labelCampo">CPF: </label>
                    <input type="text" name="cpf" value="" id="cpf" class="campoValores inCpf" />

                    <label for="rg" class="labelCampo">RG: </label>
                    <input type="text" name="rg" value="" id="rg" class="campoValores inRg" /><br>

                    <label for="dtNascimento" class="labelCampo">Data Nascimento: </label>
                    <input type="date" name="dtnascimento" value="" id="dtNascimento" class="campoValores inNascimento" /><br>

                    <label for="logradouro"  class="labelCampo">Logradouro: </label>
                    <input type="text" name="logradouro" value="" id="logradouro" class="campoValores inLogradouro" />

                    <label for="numeroCasa"  class="labelCampo">Nº: </label>
                    <input type="text" name="numeroCasa" value="" id="numeroCasa" class="campoValores inNumCasa" /><br>

                    <label for="complemento"  class="labelCampo">Complemento: </label>
                    <input type="text" name="complemento" value="" id="complemento" class="campoValores inComplemento" /><br>

                    <label for="bairro"  class="labelCampo">Bairro: </label>
                    <input type="text" name="bairro" value="" id="bairro" class="campoValores inBairro" />

                    <label for="cep"  class="labelCampo">CEP: </label>
                    <input type="text" name="cep" value="" id="cep" class="campoValores inCep" /><br>

                    <label for="cidade"  class="labelCampo">Cidade: </label>
                    <input type="text" name="cidade" value="" id="cidade" class="campoValores inCidade" />

                    <label for="uf"  class="labelCampo">UF: </label>
                    <select name="uf" id="uf" class="campoValores inUf">
                        <option value="ES">ES</option>
                        <option value="RJ">RJ</option>
                    </select><br>

                    <label for="salario"  class="labelCampo">Salário: </label>
                    <input type="text" name="salario" value="" id="salario" class="campoValores inSalario" /><br>

                    <label for="ativo" class="labelCampo">Status:</label>
                    <span class="textoRadios"><input type="radio" name="status" value="Ativo" id="ativo" />Ativo<br></span>
                    <span class="textoRadios radioInativo"><input type="radio" name="status" value="Inativo" id="inativo" />Inativo</span> 

                    <fieldset class="quadroLoginFunc">
                        <legend id="tituloLoginFunc">LOGIN</legend>
                        <span class="textoCheckBox"><input type="checkbox" name="habilitarLogin" value="habilitarLogin"  id="habilitarLogin"/>Habilitar Login</span><br>

                        <label for="loginFuncionario" class="labelCampo">Login: </label>
                        <input  type="text" name="loginFuncionario" value="" id="loginFuncionario" class="campoValores inLoginCadastro" disabled="true"/><br>

                        <label for="senhaFuncionario" class="labelCampo">Senha: </label>
                        <input  type="password" name="senhaFuncionario" value="" id="senhaFuncionario" class="campoValores inSenhaCadastro" disabled="true"/>
                    </fieldset>

                    <br>
                    <input type="submit" name="btnFuncionarioCadastrar" value="Cadastrar" class="botoes">
                    <input type="reset" name="btnFuncionarioLimpar" value="Limpar" class="botoes">
                </form>
            </section>
            <div class="limparFloat"></div>
        </div>

        <footer class="gradienteRoxo-Lilas" >
            <p>© Copyright 2014 Copyright.com.br - Todos os direitos reservados</p>
        </footer>

    </body>
</html>
