<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamadoDAO = new ChamadoDAO();
$chamados = $chamadoDAO->listarEspera();

?>

<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px;">
		  <div class="d_flex"></div>
			<div class="container" style="margin-bottom: 180px;">
				<div class="h3topo" style="text-align: center;">
        			<h3>Chamados em espera</h3>
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
								</ul>
								<a class="btn btn-primary" href="visualizar_chamado.php?id=<?= $chamado->getId() ?>"><i class="fa fa-eye"></i></a>
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