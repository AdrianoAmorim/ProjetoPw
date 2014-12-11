
//carrega ao documento se aberto
$(document).ready(function () {
    $("div#buscarFuncionario").hide();
    $("div#buscarCargo").hide();
    $("div#fade").hide();
    $("div#fade").fadeIn(1000);
    carregarTabelaMaiorVendedor();
});

//habilita e desabilita a busca pelo funcionario no cadastro
function habilitarBuscaFuncionario() {
    $("div#buscarFuncionario").slideToggle();
}
function habilitarBuscaCargo() {
    $("div#buscarCargo").slideToggle();
}
//faz uma solicitação com ajax e pega os dados para preencher tabela de vendas 
//por periodo de todos os funcionarios 
function carregarTabelaMaiorVendedor() {
    var dataInicial = $("input[name='opcoesTabelaMaiorVendedorDtInicial']").val();
    var dataFinal = $("input[name='opcoesTabelaMaiorVendedorDtFinal']").val();

    $.get("procMaiorVendedor.php", {dataInicial: dataInicial, dataFinal: dataFinal}, function (dados) {
        $("#tabelaFuncionarios").html(dados);

    });

}
//carrega tabela de relatorio com todos funcionarios
function carregarTabelaFuncionarios() {

    $.get("procListarFuncionario.php", null, function (data) {

        $("#conteudoTabelas").html(data);
    });
}
//carrega tabela de relatorio por cargo
function carregarTabelaRelatorioCargo() {
    var cargo = $("select#opcoesTabelaCargo").val();

    $.get("procListaFuncionarioCargo.php", {cargo: cargo}, function (data) {

        $("#conteudoTabelas").html(data);
    });
}

function carregarTabelaRelatorioStatus() {
    var status = $("select#opcoesTabelaStatus").val();

    $.get("procListarFuncionarioStatus.php", {status: status}, function (data) {

        $("#conteudoTabelas").html(data);
    });
}

//gera o relatorio de desempenho de cada funconario
function carregarTabelaRelatorioDesempenho() {
    $.get("procListarFuncionarioDesempenho.php", null, function (data) {
        $("#conteudoTabelas").html(data);
    });
}

//busca os dados noo banco para carrega o grafico
function procDadosGrafico(cod) {

    $.getJSON("procDadosGrafico.php", {codFunc: cod}, function (data) {

        carregarGrafico(data);
    });
}

//pega os Objetos JSON e transforma no Array para o Grafico
function converterJSONtoArray(dados) {

    var vdados = new Array(dados.length);
    for (var i = 0; i < dados.length; i++) {
        vdados[i] = new Array(2);
    }
    for (var i = 0; i < dados.length; i++) {
        vdados[i][0] = dados[i].mes;
        vdados[i][1] = parseInt(dados[i].soma);

    }

    return vdados;
}

//consulta o funcionario e carrega as opçoes no select
function procBuscaFuncionario() {
    var cod = $("input[name='codBuscarFunc']").val();
    var nome = $("input[name='nomeBuscarFunc']").val();

    $.get("procBuscaFuncionario.php", {codFunc: cod, nomeFunc: nome}, function (data) {
        $("div#resultBuscaFuncionario").html(data);
    });
    $("input[name='codBuscarFunc']").val("");
    $("input[name='nomeBuscarFunc']").val("");
}
//buscar o cargo para cadastrar o funcionario
function procBuscaCargo() {
    var cod = $("input[name='codBuscarCargo']").val();
    var descricao = $("input[name='nomeBuscarCargo']").val();

    $.get("procBuscaCargo.php", {codCargo: cod, nomeCargo: descricao}, function (data) {
        $("div#resultBuscaCargo").html(data);
    });
    $("input[name='codBuscarCargo']").val("");
    $("input[name='nomeBuscarCargo']").val("");
}

function carregarDadosCargo() {
    var cargo = $("select[name='buscaCargolistResult'] option:selected").val();

    $("input[name='codCargo']").val(cargo);

    $("div#buscarCargo").slideUp(500);
    $("select[name='buscaCargolistResult']").empty();

}

//carrega as opções nos inputs do cadastro para Poder Alterar 
function carregarDadosFuncionario() {
    var id = $("select[name='buscaFuncionariolistResult'] option:selected").val();

    $.getJSON("procDadosResultBuscaFunc.php", {cod: id}, function (data) {

        $("input[name='codCargo']").val(data.codCargo);
        $("input[name='codFunc']").val(data.codFunc);
        $("input[name='nomeFunc']").val(data.nome);
        $("input[name='telResidencial']").val(data.telFixo);
        $("input[name='telCelular']").val(data.telCel);
        $("input[name='email']").val(data.email);
        $("input[name='cpf']").val(data.cpf);
        $("input[name='rg']").val(data.rg);
        $("input[name='dtnascimento']").val(data.dtNascimento);
        $("input[name='salario']").val(data.salario);
        $("input[name='cep']").val(data.cep);
        $("input[name='logradouro']").val(data.logradouro);
        $("input[name='numeroCasa']").val(data.numero);
        $("input[name='complemento']").val(data.complemento);
        $("input[name='bairro']").val(data.bairro);
        $("input[name='cidade']").val(data.cidade);
        $("input[name='email']").val(data.email);

        data.uf === 'RJ' ? $("select#uf option[value='RJ']").attr('selected', true) : '';
        data.uf === 'MG' ? $("select#uf option[value='MG']").attr('selected', true) : '';
        data.uf === 'ES' ? $("select#uf option[value='ES']").attr('selected', true) : '';
        data.uf === 'SP' ? $("select#uf option[value='SP']").attr('selected', true) : '';

        data.status === 't' ? $("input#t").attr('checked', true) : '';
        data.status === 'f' ? $("input#f").attr('checked', true) : '';


    });


    $("#btnCadAlt").val("Alterar");
    $("form.form-horizontal").attr("action", "procAltFuncionario.php");
    $("div#buscarFuncionario").slideUp(500);
    $("select[name='buscaFuncionariolistResult']").empty();
    $("span#tituloCadastro").html("Alterar Cadastro de Funcionário");
}

//Criacao do grafico tela Inicio
function carregarGrafico(dados) {

    //mudando o tema do grafico
    Highcharts.createElement('link', {
        //href: 'http://fonts.googleapis.com/css?family=Unica+One',
        rel: 'stylesheet',
        type: 'text/css'
    }, null, document.getElementsByTagName('head')[0]);

    Highcharts.theme = {
        colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
            "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
        chart: {
            backgroundColor: {
                linearGradient: {x1: 0, y1: 0, x2: 1, y2: 1},
                stops: [
                    [0, '#9d8bbc'],
                    [1, '#9DADD3']
                ]
            },
            style: {
                fontFamily: "'Unica One', sans-serif"
            },
            plotBorderColor: '#606063'
        },
        title: {
            style: {
                color: '#E0E0E3',
                textTransform: 'uppercase',
                fontSize: '20px'
            }
        },
        subtitle: {
            style: {
                color: '#E0E0E3',
                textTransform: 'uppercase'
            }
        },
        xAxis: {
            gridLineColor: '#707073',
            labels: {
                style: {
                    color: '#E0E0E3'
                }
            },
            lineColor: '#707073',
            minorGridLineColor: '#505053',
            tickColor: '#707073',
            title: {
                style: {
                    color: '#A0A0A3'

                }
            }
        },
        yAxis: {
            gridLineColor: '#707073',
            labels: {
                style: {
                    color: '#E0E0E3'
                }
            },
            lineColor: '#707073',
            minorGridLineColor: '#505053',
            tickColor: '#707073',
            tickWidth: 1,
            title: {
                style: {
                    color: '#A0A0A3'
                }
            }
        },
        tooltip: {
            backgroundColor: 'rgba(0, 0, 0, 0.85)',
            style: {
                color: '#F0F0F0'
            }
        },
        plotOptions: {
            series: {
                dataLabels: {
                    color: '#B0B0B3'
                },
                marker: {
                    lineColor: '#333'
                }
            },
            boxplot: {
                fillColor: '#505053'
            },
            candlestick: {
                lineColor: 'white'
            },
            errorbar: {
                color: 'white'
            }
        },
        legend: {
            itemStyle: {
                color: '#E0E0E3'
            },
            itemHoverStyle: {
                color: '#FFF'
            },
            itemHiddenStyle: {
                color: '#606063'
            }
        },
        credits: {
            style: {
                color: '#666'
            }
        },
        labels: {
            style: {
                color: '#707073'
            }
        },
        drilldown: {
            activeAxisLabelStyle: {
                color: '#F0F0F3'
            },
            activeDataLabelStyle: {
                color: '#F0F0F3'
            }
        },
        navigation: {
            buttonOptions: {
                symbolStroke: '#DDDDDD',
                theme: {
                    fill: '#505053'
                }
            }
        },
        // scroll charts
        rangeSelector: {
            buttonTheme: {
                fill: '#505053',
                stroke: '#000000',
                style: {
                    color: '#CCC'
                },
                states: {
                    hover: {
                        fill: '#707073',
                        stroke: '#000000',
                        style: {
                            color: 'white'
                        }
                    },
                    select: {
                        fill: '#000003',
                        stroke: '#000000',
                        style: {
                            color: 'white'
                        }
                    }
                }
            },
            inputBoxBorderColor: '#505053',
            inputStyle: {
                backgroundColor: '#333',
                color: 'silver'
            },
            labelStyle: {
                color: 'silver'
            }
        },
        navigator: {
            handles: {
                backgroundColor: '#666',
                borderColor: '#AAA'
            },
            outlineColor: '#CCC',
            maskFill: 'rgba(255,255,255,0.1)',
            series: {
                color: '#7798BF',
                lineColor: '#A6C7ED'
            },
            xAxis: {
                gridLineColor: '#505053'
            }
        },
        scrollbar: {
            barBackgroundColor: '#808083',
            barBorderColor: '#808083',
            buttonArrowColor: '#CCC',
            buttonBackgroundColor: '#606063',
            buttonBorderColor: '#606063',
            rifleColor: '#FFF',
            trackBackgroundColor: '#404043',
            trackBorderColor: '#404043'
        },
        // special colors for some of the
        legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
        background2: '#505053',
        dataLabelsColor: '#B0B0B3',
        textColor: '#C0C0C0',
        contrastTextColor: '#F0F0F3',
        maskColor: 'rgba(255,255,255,0.3)'
    };

//--------------------------------------------------------------------------------------------------------
//Criacao do grafico
    Highcharts.setOptions(Highcharts.theme);

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total de Venda Mensal',
            style: {
                textShadow: '0 0 3px black'
            }
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -40,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            labels: {
                format: 'R$ {value}',
                style: {
                    color: '#FFFFFF'
                }
            },
            min: 0,
            title: {
                text: 'Total Vendido',
                style: {
                    color: '#FFFFFF',
                    textShadow: '0 0 3px black'
                }
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Venda total: <b>{point.y:.2f}</b>'
        },
        series: [{
                name: 'Mes',
                //os dados tem q entrar aki depois do data:
                data: converterJSONtoArray(dados),
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }]

    });
}
;
//------------------------------------------------------------------------------------------------------

