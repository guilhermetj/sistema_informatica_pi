<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamadoDAO = new ChamadoDAO();
$chamados = $chamadoDAO->listarEspera();
?>
<div style="width: 100%;">
	<?php
	if (isset($_GET['msg']) && $_GET['msg'] != '') {
		echo '<div class="alert alert-info text-center">' . $_GET['msg'] . '</div>';
	}
	?>

	<table class="table text-center">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Status</th>
				<th>Equipamento</th>
				<th>Abertura</th>
				<th>Visualizar</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($chamados as $chamado) { ?>
				<tr>
					<td><?= $chamado->getIdCliente() ?></td>
					<td><?= $chamado->getStatus() ?></td>
					<td><?= $chamado->getEquipamento() ?></td>
					<td><?= $chamado->getAbertura() ?></td>
					<td>
					<a class="btn btn-primary" href="visualizar_chamado.php?id=<?= $chamado->getId() ?>"><i class="fa fa-eye"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include 'layout/footer.php'; ?>