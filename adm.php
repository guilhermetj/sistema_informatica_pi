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
require 'classes/Funcionario.php';
require 'classes/FuncionarioDAO.php';
$funcionarioDAO = new FuncionarioDAO();
$funcionarios = $funcionarioDAO->listarfuncionarios();
/*var_dump($total_chamado_finalizado);exit;*/
//primeiro grafico
$grafico_total_chamados = json_encode($relatorioDAO->contarChamadoAndamento());

//segundo grafico
$grafico_cliente_mes = ($relatorioDAO->contarMesCliente());

 ?>
 
<style>
  button.btn {
    border-radius: 5px;
  }
  .d_flex {
    margin-bottom: 20px;
  }
</style>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <div class="card-header" style="text-align: center; border-radius: 5px;">
      <h4>Dashboard</h4>
    </div>
    <!-- Icon Cards-->
    <div class="row" style="margin-top: 10px;">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-user-friends"></i>
            </div>
            <div class="mr-5"><?= $total_cliente['total'] ?? 0; ?> Clientes</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="cliente.php">
            <span class="float-left">Mais Detalhes</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-list"></i>
            </div>
            <div class="mr-5"><?= $total_chamado_iniciado['total'] ?? 0; ?> Tickets Abertos</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="chamado_andamento.php">
            <span class="float-left">Mais Detalhes</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-tasks"></i>
            </div>
            <div class="mr-5"><?= $total_chamado_finalizado['total'] ?? 0; ?> Tickets Encerrados</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="chamado_finalizado.php">
            <span class="float-left">Mais Detalhes</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-user-tie"></i>
            </div>
            <div class="mr-5"><?= $total_funcionario['total'] ?? 0; ?> Funcionários</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="funcionario.php">
            <span class="float-left">Mais Detalhes</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="graficos" style="margin-bottom: 10px;">
    <div class="container-fluid" style="margin-bottom: 10px;">
      <div class="d_flex">
        <div class="card">
          <div class="card-header">
            <h6><i class="fas fa-calendar-alt"></i> Clientes cadastrados por tempo</h6>
          </div>
          <div class="card-body">
            <figure class="highcharts-figure">
              <div id="clientes_cadastrados"></div>
              <button class="btn btn-info" id="plain">Plano</button>
              <button class="btn btn-info" id="inverted">Invertido</button>
              <button class="btn btn-info" id="polar">Polar</button>
            </figure>
          </div> 
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row d_flex" style="margin-bottom: 70px;">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h6><i class="fa fa-area-chart"></i> Relatórios e Vizualização de Estatísticas de Chamados</h6>
            </div>
            <div class="card-body" style="padding-bottom: 30px; padding-top: 28px;">
              <div id="chamados"></div>
            </div>
            <div class="card-footer small text-muted" style="text-align: center;">Junho de 2020</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
              <div class="card-header">
                <i class="fas fa-user-tie"></i> Funcionários</div>
                <?php foreach ($funcionarios as $funcionario) { ?>
                <div class="list-group list-group-flush small">
                  <a class="list-group-item list-group-item-action" href="#">
                    <div class="media">
                      <img class="d-flex mr-3 rounded-circle" style="width: 15%;" src="assets/img/user.png" alt="">
                      <div class="media-body">
                        <strong><?= $funcionario->getNome() ?> </strong> Atualmente está oculpando o cargo de <?= $funcionario->nome_cargo; ?>.
                        <div class="text-muted smaller">última atualização hoje as 18:40</div>
                      </div>
                    </div>
                  </a>
                </div>
                <?php } ?>
            </div>
            <a class="list-group-item list-group-item-action" href="funcionario.php">Mais detalhes</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'layout/footer.php'; ?>


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

<!-- clientes dia/semana/mes/trimestre/semestre/ano -->
<script>

    var chart = Highcharts.chart('clientes_cadastrados', {
    
    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },

    xAxis: {
        
        categories: [
                        <?php $n = 0; foreach($grafico_cliente_mes as $mes) { ?>
                            '<?php echo $mes['mes']; ?>' <?php if($n < count($grafico_cliente_mes)) { echo ','; }?>
                        <?php $n++; } ?>

                    ] //foreach(?) aqui dentro dos colchetes
               
    },

    series: [{
        type: 'column',
        colorByPoint: false,
        data:[
                <?php $n = 0; foreach($grafico_cliente_mes as $data) { ?>
                    <?php echo $data['clientes']; ?>
                    <?php if($n < count($grafico_cliente_mes)) { echo ','; }?>
                <?php $n++; } ?>

            ],//foreach com dados aqui dentro dos colchetes 
        
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