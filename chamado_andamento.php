<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Chamado.php';
require 'classes/ChamadoDAO.php';
$chamadoDAO = new ChamadoDAO();
$funcionario = $_SESSION['id_funcionario'];
$chamados = $chamadoDAO->listarAndamento($funcionario);
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
				<th>Funcionário</th>
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
					<td><?= $chamado->nome_funcionario; ?></td>
					<td><?= $chamado->getStatus() ?></td>
					<td><?= $chamado->getEquipamento() ?></td>
					<td><?= $chamado->getDescricao() ?></td>
					<td><?= $chamado->getAbertura() ?></td>
					<td>
						<a class="btn btn-warning" style="padding-right: 8px;" href="form_chamado.php?id=<?= $chamado->getId() ?>"><i class="far fa-edit"></i></a>
						<a class="btn btn-danger" href="controle_chamado.php?acao=finalizarChamado&id=<?= $chamado->getId() ?>" onclick="return confirm('Deseja realmente Finalizar esse chamado?')"><i class="far fa-check-square"></i></a>
						<a target="__blank" href="pdf_chamado_andamento.php?id=<?= $chamado->getId() ?>" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
  </div>
</div>


<?php include 'layout/footer.php'; ?>