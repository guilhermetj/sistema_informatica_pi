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
				<th>ID</th>
				<th>Cliente</th>
				<th>Status</th>
				<th>Equipamento</th>
				<th>descricao</th>
				<th>Abertura</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($chamados as $chamado) { ?>
				<tr>
					<td><?= $chamado->getId() ?></td>
					<td><?= $chamado->getIdCliente() ?></td>
					<td><?= $chamado->getStatus() ?></td>
					<td><?= $chamado->getEquipamento() ?></td>
					<td><?= $chamado->getDescricao() ?></td>
					<td><?= $chamado->getAbertura() ?></td>
					<td>
						<a class="btn btn-warning" style="padding-right: 8px;" href="form_chamado.php?id=<?= $chamado->getId() ?>"><i class="far fa-edit"></i></a>
						<a class="btn btn-danger" href="controle_chamado.php?acao=finalizarChamado&id=<?= $chamado->getId() ?>" onclick="return confirm('Deseja realmente Finalizar esse chamado?')"><i class="far fa-check-square"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include 'layout/footer.php'; ?>