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
  	<div class="h3topo" style="text-align: center;">
    	<h3>Chamados em andamento</h3>
    </div><br>
  	<table class="table text-center">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Status</th>
				<th>Equipamento</th>
				<th>Descrição</th>
				<th>Abertura</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($chamados as $chamado) { ?>
				<tr>
					<td><?= $chamado->nome_cliente; ?></td>
					<td><?= $chamado->getStatus() ?></td>
					<td><?= $chamado->getEquipamento() ?></td>
					<td><?= $chamado->getDescricao() ?></td>
					<td><?= $chamado->getAbertura() ?></td>
					<td>
						<a class="btn btn-primary" href="visualizar_chamado.php?id=<?= $chamado->getId() ?>"><i class="fa fa-eye"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
  </div>
</div>



<?php include 'layout/footer.php'; ?>