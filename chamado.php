<?php include 'layout/header.php'; 
?>
<?php 
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamadoDAO = new ChamadoDAO();
$chamados = $chamadoDAO->listar();
?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != ''){
		echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
 ?>
<div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2>Gerenciar Chamados</h2>
	</div>
	<div class="col-2">
		<a href="form_chamado.php" class="btn btn-success">Nova</a>
	</div>
</div>
<div class="row">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Cliente</th>
				<th>Status</th>
				<th>Equipamento</th>
				<th>descricao</th>
				<th>Abertura</th>
				<th>Encerramento</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($chamados as $chamado){ ?>
			<tr>
				<td><?= $chamado->getId() ?></td>
				<td><?= $chamado->getIdCliente() ?></td>
				<td><?= $chamado->getStatus() ?></td>
				<td><?= $chamado->getEquipamento() ?></td>
				<td><?= $chamado->getDescricao() ?></td>
				<td><?= $chamado->getAbertura() ?></td>
				<td><?= $chamado->getEncerramento() ?></td>
				<td>
					<a href="form_chamado.php?id=<?= $chamado->getId() ?>">Editar</a> | 
					<a href="controle_chamado.php?acao=finalizarChamado&id=<?= $chamado->getId() ?>" onclick="return confirm('Deseja realmente Finalizar esse chamado?')">Finalizar</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


<?php include 'layout/footer.php'; ?> 