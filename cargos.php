<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Cargos.php';
require 'classes/CargosDAO.php';
$cargoDAO = new CargosDAO();
$cargo = $cargoDAO->listar();
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
				<th>Nome</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($cargo as $cargos) { ?>
				<tr>
					<td><?= $cargos->getId() ?></td>
					<td><?= $cargos->getNome() ?></td>

					<td>
						<a class="btn btn-warning" style="padding-right: 8px;" href="form_cargos.php?id=<?= $cargos->getId() ?>"><i class="far fa-edit"></i></a>
						<a class="btn btn-danger" href="controle_cargos.php?acao=deletar&id=<?= $cargos->getId() ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include 'layout/footer.php'; ?>