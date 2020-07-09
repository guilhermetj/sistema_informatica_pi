<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';

  require 'classes/HistoricoChamado.php';
  require 'classes/HistoricoChamadoDAO.php';

$chamadoDAO = new ChamadoDAO();


$historicoChamadoDAO = new HistoricoChamadoDAO();

 if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$chamados = $chamadoDAO->listarTodos($_GET['pesquisa']);
	/*var_dump($chamados);exit;*/
} else {
	$chamados = $chamadoDAO->listarTodos();
} 



?>



<div class="content-wrapper">
	<div class="h3topo" style="text-align: center;">
        		<h3>Lista de Chamados</h3>
    </div><br>
	<div class="container">
	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Pesquisar" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
	      	<i class="fas fa-search"></i>	
	      </button>
	      <a href="./chamado_todos.php" class="btn btn-outline-primary my-2 my-sm-0">
	      	<i class="fas fa-trash-alt"></i>
	      </a>
	    </form>
	</div>
						<table class="table text-center">
							<thead>
								<tr>
									<th>ID</th>
									<th>Cliente</th>
									<th>Funcionário</th>
									<th>Status</th>
									<th>Equipamento</th>
									<th>Abertura</th>
									<th>Encerrado</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($chamados as $chamado) { 
							$historicoChamados = $historicoChamadoDAO->getHistorico($chamado->getid());
							?>
							<tr>
									<td><?= $chamado->getId() ?></td>
									<td><?= $chamado->nome_cliente; ?></td>
									<td><?= $chamado->nome_funcionario; ?></td>
									<td><?= $chamado->getStatus() ?></td>
									<td><?= $chamado->getEquipamento() ?></td>
									<td><?= date('d/m/Y H:i:s', strtotime($chamado->getAbertura())); ?></td>
									<td><?= $chamado->getEncerramento() ?></td>
									<td>
									<a target="__blank" href="pdf_chamado_finalizado.php?id=<?= $chamado->getId() ?>" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
									<a href="" class="btn btn-primary" data-toggle="modal" data-target="#historico<?= $chamado->getId(); ?>"><i class="fas fa-history"></i></a>
									</td>	
							</tr>
						</tbody>
								<div class="modal fade" id="historico<?= $chamado->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Descrição do chamado</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
											<strong><?= $chamado->getDescricao() ?></strong><br>

									</div>
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Historico do chamado</h5>
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
									</div>
									</div>
								</div>
								</div>
					<?php } ?>
					</table>
	</div>
</div>
<?php include 'layout/footer.php'; ?>