<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>

<?php 
include 'classes/RelatorioDAO.php';
$relatorioDAO = new RelatorioDAO();
$funcionario = $_SESSION['id_funcionario'];
$total_chamado_iniciado = $relatorioDAO->contar('chamado', "status = 'Em andamento'", "id_funcionario = '{$funcionario}'");
$total_cliente = $relatorioDAO->contar('cliente');
$total_funcionario = $relatorioDAO->contar('funcionario');
$total_chamado_finalizado = $relatorioDAO->contar('chamado', "status = 'Finalizado'","id_funcionario = '{$funcionario}'");
/*var_dump($total_chamado_finalizado);exit;*/
//primeiro grafico
$grafico_total_chamados = json_encode($relatorioDAO->contarChamadoAndamento());

//segundo grafico
$grafico_cliente_mes = json_encode($relatorioDAO->contarMesCliente());

 ?>


    <div class="content p-1">
        <div class="list-group-item">
            <div class="d-flex">
                <div class="mr-auto p-2 "style="width: 100%;">
                <?php
                  if (isset($_GET['msg']) && $_GET['msg'] != '') {
                    echo '<div class="alert alert-success text-center">' . $_GET['msg'] . '</div>';
                  }
                  ?>
                    <h2 class="display-4 titulo">Dashboard</h2>
                </div>
            </div>
            <div class="row">
                <div class="col" style="text-align: center">
                    <a href="cliente.php" style="text-decoration: none;">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x"></i>
                                <h6 class="card-title">Clientes</h6>
                                <h2 class="lead cliente"><?= $total_cliente['total'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" style="text-align: center;">
                    <a href="chamado_andamento.php" style="text-decoration: none;">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <i class="fas fa-headset fa-3x"></i>
                                <h6 class="card-title">Em andamento</h6>
                                <h2 class="lead chamado"><?= $total_chamado_iniciado['total'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" style="text-align: center;">
                    <a href="chamado_finalizado.php" style="text-decoration: none;">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-headset fa-3x"></i>
                                <h6 class="card-title">Finalizados</h6>
                                <h2 class="lead chamado"><?= $total_chamado_finalizado['total'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col" style="text-align: center;">
                     <a href="funcionario.php" style="text-decoration: none;">
                        <div class="card bg-secondary text-white">
                            <div class="card-body">
                                <i class="fas fa-address-card fa-3x"></i> 
                                <h6 class="card-title">Funcionarios</h6>
                                <h2 class="lead funcionario"><?= $total_funcionario['total'] ?? 0; ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
    </div>


            <!-- GRÁFICOS -->
            <div class="d-flex">
                <div class="mr-auto p-0 text-center" style="width: 100%; margin-top: 15px;">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="display-4 titulo">Geração de Relatórios e Vizualização de Estatísticas de Atendimento</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mr-auto p-2 "style="width: 100%;">
                <h3 class="display-4 titulo">Chamados</h3>
            </div>

            <div class="row">
                <div class="col">
                    <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Por categoria de atendimento</h6>
                        </div>
                        <div class="card-body">
                            <div id="chamados"></div>
                        </div>
                    </div>
                    </div>
                </div> 
            </div>

            <div class="mr-auto p-2 "style="width: 100%;">
                <h3 class="display-4 titulo">Clientes</h3>
            </div>
            <div class="row">
                <div class="col">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h6>Clientes cadastrados por tempo</h6>
                            </div>
                            <div class="card-body col-sm-12">
                            <figure class="highcharts-figure">
                                <div id="clientes_cadastrados"></div>

                                <button id="plain">Plain</button>
                                <button id="inverted">Inverted</button>
                                <button id="polar">Polar</button>
                            </figure>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    

<?php include 'layout/footer.php'; ?>


<!-- chamados dia/semana/mes/trimestre/semestre/ano -->
<script>
    var dadosTotalChamados = JSON.parse('<?php echo $grafico_total_chamados; ?>');

    dataTotalChamados = [];
    for(var x in dadosTotalChamados){
        dataTotalChamados[x] = {
            name:dadosTotalChamados[x].name,
            y: parseFloat(dadosTotalChamados[x].y)
        }
    }
    console.log(dataTotalChamados)
    Highcharts.chart('chamados', {
    credits:false,
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Percentual',
        colorByPoint: true,
        data: dataTotalChamados,
    }]
});
</script>


<!-- visualização personalizada -->
<!-- <script>
    Highcharts.chart('chamados_perso', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'bar'
    },
    title: {
        text: 'Chamados do mês MM/YYYY'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});
</script> -->


<!-- clientes dia/semana/mes/trimestre/semestre/ano -->
<!-- <script>
    Highcharts.chart('container', {

title: {
    text: ''
},

subtitle: {
    text: ''
},

yAxis: {
    title: {
        text: 'Número de clientes cadastrados'
    }
    
},

xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },

legend:false,
credits: false,

plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
},

series: [{
    name: 'Cadastros',
    data: [103, 178, 304, 350, 104, 670, 70, 350]
},],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script> -->


<!-- clientes dia/semana/mes/trimestre/semestre/ano -->
<script>

    var arrayphp = (JSON.parse('<?php echo $grafico_cliente_mes; ?>'));

    arrayjs = [];
    for(var x in arrayphp){
        arrayjs[x] = {
            categories:arrayphp[x].clientes,
            data:arrayphp[x].mes,
            
        }
           
    }


    var chart = Highcharts.chart('clientes_cadastrados', {
    
    title: {
        text: 'Chart.update'
    },

    subtitle: {
        text: 'Plain'
    },

    xAxis: {
        
        categories:[arrayjs[0].categories,arrayjs[1].categories] //foreach(?) aqui dentro dos colchetes
            
        //[
        //$arrayClientesMes = array($grafico_cliente_mes);
        //foreach ($arrayClientesMes as $clienteMes){  
        //}]
    
            
    },

    series: [{
        type: 'column',
        colorByPoint: false,
        data:[arrayjs[x].data],//foreach com dados aqui dentro dos colchetes 
        showInLegend: false
    }]

    });


    $('#plain').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: false
        },
        subtitle: {
            text: 'Plain'
        }
    });
    });

    $('#inverted').click(function () {
    chart.update({
        chart: {
            inverted: true,
            polar: false
        },
        subtitle: {
            text: 'Inverted'
        }
    });
    });

    $('#polar').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: true
        },
        subtitle: {
            text: 'Polar'
        }
    });
    });
</script>