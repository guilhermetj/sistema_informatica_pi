<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamadoDAO = new ChamadoDAO();
$funcionario = $_SESSION['id_funcionario'];
$chamados = $chamadoDAO->listarFinalizado($funcionario);
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
				<th>Finalizado</th>
				<th>Visualizar</th>
				<th>Gerar PDF</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($chamados as $chamado) { ?>
				<tr>
					<td><?= $chamado->nome_cliente; ?></td>
					<td><?= $chamado->getStatus() ?></td>
					<td><?= $chamado->getEquipamento() ?></td>
					<td><?= $chamado->getEncerramento() ?></td>
					<td>
					<a class="btn btn-primary" href="visualizar_chamadoFinalizado.php?id=<?= $chamado->getId() ?>"><i class="fa fa-eye"></i></a>
					</td>
					<td>
						<a href="pdf_chamado_finalizado.php?id=<?= $chamado->getId() ?>" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include 'layout/footer.php'; ?>