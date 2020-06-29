<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';

  require 'classes/HistoricoChamado.php';
  require 'classes/HistoricoChamadoDAO.php';

$chamadoDAO = new ChamadoDAO();
$funcionario = $_SESSION['id_funcionario'];
$chamados = $chamadoDAO->listarTodos($funcionario);

$historicoChamadoDAO = new HistoricoChamadoDAO();


?>



<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px;">
		  <div class="d_flex"></div>
			<div class="container" style="margin-bottom: 180px;">
				<div class="h3topo" style="text-align: center;">
        			<h3>Lista de Chamados</h3>
    			</div><br>
				<div class="row">
				<?php foreach ($chamados as $chamado) { 
					$historicoChamados = $historicoChamadoDAO->getHistorico($chamado->getid());

				?>
					<div class="col-sm-4" style="padding-bottom: 15px;">

						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Chamado n° <?= $chamado->getid() ?></h5>
								<ul class="list-group" style="padding-bottom: 15px; padding-top: 15px;">
									<li class="list-group-item">
										Cliente: <strong><?= $chamado->nome_cliente; ?></strong>
									</li>
									<li class="list-group-item">
										Funcionário: <strong><?= $chamado->nome_funcionario; ?></strong>
									</li>
									<li class="list-group-item">
										Status: <strong><?= $chamado->getStatus() ?></strong>
									</li>
									<li class="list-group-item">
										Equipamento: <strong><?= $chamado->getEquipamento() ?></strong>
									</li>
									<li class="list-group-item">
										Descrição: <strong><?= $chamado->getDescricao() ?></strong>
									</li>
									<li class="list-group-item">
										Abertura: <strong><?= $chamado->getAbertura() ?></strong>
									</li>
									<li class="list-group-item">
										Encerrado: <strong><?= $chamado->getAbertura() ?></strong>
									</li>
								</ul>
								<a target="__blank" href="pdf_chamado_finalizado.php?id=<?= $chamado->getId() ?>" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
								<a href="" class="btn btn-primary" data-toggle="modal" data-target="#historico<?= $chamado->getId(); ?>">Ver historico</a>
							</div>
						</div>
					</div>
					<div class="modal fade" id="historico<?= $chamado->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Historico do chamado</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<?php foreach ($historicoChamados as $historicoChamado) { ?>
									<strong>Funcionario:<?= $historicoChamado->nome; ?></strong><br>
									<strong>Data: <?= $historicoChamado->getDtHistorico() ?></strong><br>
									<strong>Descrição: <?= $historicoChamado->getDescricao() ?></strong><br>
									<strong>Solução: <?= $historicoChamado->getSolucao() ?></strong><hr>
								<?php } ?> 
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								<a href="form_chamado.php" class="btn btn-primary">Alterar</a>
							</div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'layout/footer.php'; ?>