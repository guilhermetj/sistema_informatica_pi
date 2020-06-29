<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Chamado.php';
	require 'classes/ChamadoDAO.php';
	require 'classes/HistoricoChamado.php';
  	require 'classes/HistoricoChamadoDAO.php';

	$chamado = new Chamado();

	if(isset($_GET['id']) && $_GET['id'] != ''){
		$id = $_GET['id'];
		$chamadoDAO = new ChamadoDAO();
		$chamado = $chamadoDAO->get($id);
	}

	$historicoChamadoDAO = new HistoricoChamadoDAO();
	$historicoChamados = $historicoChamadoDAO->getHistorico($id);

?>



<div class="content-wrapper">
  	<div class="container-fluid">
	  	<div class="h3topo" style="text-align: center; margin-top: 20px;">
            <h3>Visualizar Chamado</h3>

				<a href="pdf_chamado_finalizado.php?id=<?= $chamado->getId() ?>" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
        </div><br>
		<div class="card">
		<div class="card-header">
	        <a href="chamado_finalizado.php" class="btn-sm btn-primary">Voltar</a>
	        <div class="text-center">
				<h5>Chamado Número <?php echo $chamado->getId() ?></h5>
		</div>
		</div>
			<div class="card-body text-center">
				<div class="container">
					<label>Status: <?php echo $chamado->getStatus() ?></label><br>
					<label>Data da abertura: <?php echo $chamado->getAbertura() ?></label><br>
					<label>Cliente: <?php echo $chamado->getIdCliente() ?></label><br>
					<label>Equipamento: <?php echo $chamado->getEquipamento() ?></label><br>
					<label>Descrição: <?php echo $chamado->getDescricao() ?></label><br>
				</div>

			</div>
			<div class="card-header text-center">
			<h5><strong>Historico do chamado</strong></h5>
			</div>
			<div class="card-body text-center">
			<?php foreach ($historicoChamados as $historicoChamado) { ?>
				<strong>Funcionario:<?= $historicoChamado->nome; ?></strong><br>
				<strong>Data: <?= $historicoChamado->getDtHistorico() ?></strong><br>
				<strong>Descrição: <?= $historicoChamado->getDescricao() ?></strong><br>
				<strong>Solução: <?= $historicoChamado->getSolucao() ?></strong><hr>
			<?php } ?>

			</div>
		</div>
		</div>
		</div>
	</div>



<?php include './layout/footer.php'; ?> 



