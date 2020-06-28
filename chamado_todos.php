<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamadoDAO = new ChamadoDAO();
$funcionario = $_SESSION['id_funcionario'];
$chamados = $chamadoDAO->listarTodos($funcionario);
?>



<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px;">
		  <div class="d_flex"></div>
			<div class="container" style="margin-bottom: 180px;">
				<div class="h3topo" style="text-align: center;">
        			<h3>Lista de Chamados</h3>
    			</div><br>
				<div class="row">
				<?php foreach ($chamados as $chamado) { ?>
					<div class="col-sm-6" style="padding-bottom: 15px;">
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
										Abertura: <strong><?= $chamado->getAbertura() ?></strong>
									</li>
									<li class="list-group-item">
										Descrição: <strong><?= $chamado->getDescricao() ?></strong>
									</li>
								</ul>
								<a target="__blank" href="pdf_chamado_finalizado.php?id=<?= $chamado->getId() ?>" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#descricaodotick">Histórico</button>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php foreach ($chamados as $chamado) { ?>
	<div class="modal fade" id="descricaodotick" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Descrição do chamado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= $chamado->getDescricao() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<a href="form_chamado.php" class="btn btn-primary">Alterar</a>
			</div>
			</div>
		</div>
	</div>
<?php } ?>
<!-- <?php if (isset($_GET['id']) && $_GET['id'] != '') { ?>
        <div class="col-md-6">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar Historico</button>
          <tbody class="table-striped">
		  <?php foreach ($historicoChamados as $historicoChamado) { ?>
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Funcionario: <?= $historicoChamado->nome; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted">Data: <?= $historicoChamado->getDtHistorico() ?></h6>
                  <p class="card-text"><?= $historicoChamado->getDescricao() ?></p>
                  <p class="card-text"><?= $historicoChamado->getSolucao() ?></p>
                </div>
              </div>
            <?php } ?>
          </tbody>
        </div>
      <?php } ?> -->


<?php include 'layout/footer.php'; ?>