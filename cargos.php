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






<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Selecione "Sair" caso desejar encerrar a sessão.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger" href="login.html">Sair</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'layout/footer.php'; ?>