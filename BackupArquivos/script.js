
//carrega ao documento se aberto
$(document).ready(function () {
    $("div#buscarFuncionario").hide();
    carregarTabelaMaiorVendedor();
});

//habilita e desabilita a busca pelo funcionario no cadastro
function habilitarBusca() {
    $("div#buscarFuncionario").slideToggle();
}


//faz uma solicitação com ajax e pega os dados para preencher tabela de vendas 
//de todos os funcionarios
function carregarTabelaMaiorVendedor() {
    var dataInicial = $("input[name='opcoesTabelaMaiorVendedorDtInicial']").val();
    var dataFinal = $("input[name='opcoesTabelaMaiorVendedorDtFinal']").val();

    $.get("procMaiorVendedor.php", {dataInicial: dataInicial, dataFinal: dataFinal}, function (dados) {
        $("#tabelaFuncionarios").html(dados);

    });

}


function procDadosGrafico(cod) {

    $.getJSON("procDadosGrafico.php", {codFunc: cod}, function (data) {

        carregarGrafico(data);
    });
}

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
        $("div#resultBusca").html(data);
    });
    $("input[name='codBuscarFunc']").val("");
    $("input[name='nomeBuscarFunc']").val("");
}

//carrega as opções nos inputs
function carregarDadosFuncionario() {
    var id = $("select[name='buscaFuncionariolistResult'] option:selected").val();

    $.getJSON("procDadosResultBuscaFunc.php", {cod: id}, function (data) {
        
        $("input[name='codCargo']").val(data.codCargo);
        //$("input[name='codCargo']").val(data.codFunc);
        $("input[name='nomeFunc']").val(data.nome);
        $("input[name='telResidencial']").val(data.telFixo);
        $("input[name='telCelular']").val(data.telCel);
        $("input[name='email']").val(data.email);
        $("input[name='cpf']").val(data.cpf);
        $("input[name='rg']").val(data.rg);
        $("input[name='dtnascimento']").val(data.dtNascimento);
        $("input[name='salario']").val(data.salario);
    });


    $("#cadAlt").val("Alterar");
    $("form.form-horizontal").attr("action", "procAltFuncionario.php");
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

