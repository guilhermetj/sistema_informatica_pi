<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
$permissoes = retornaControle('funcionario');
require 'classes/Funcionario.php';
require 'classes/FuncionarioDAO.php';
$funcionarioDAO = new FuncionarioDAO();
$funcionarios = $funcionarioDAO->listarfuncionarios();

/*var_dump($funcionarios);exit;*/
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
				<th>Cargo</th>
				<th>Data de criação</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody class="table-striped">
			<?php foreach ($funcionarios as $funcionario) { ?>
				<tr>
					<td><?= $funcionario->getId() ?></td>
					<td><?= $funcionario->getNome() ?></td>
					<td><?= $funcionario->nome_cargo; ?></td>
					<td><?= $funcionario->getCreated() ?></td>
					<td>
						<?php if($permissoes['editar']): ?>
						<a class="btn btn-warning" style="padding-right: 8px;" href="form_funcionario.php?id=<?= $funcionario->getId() ?>"><i class="far fa-edit"></i></a>
						<?php endif; ?>
						<?php if($permissoes['deletar']): ?>
						<a class="btn btn-danger" href="controle_funcionario.php?acao=deletar&id=<?= $funcionario->getId() ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash"></i></a>
						<?php endif; ?>
						<?php if($permissoes['ler']): ?>
						<a class="btn btn-primary" href="visualizar_funcionario.php?id=<?= $funcionario->getId() ?>"><i class="fa fa-eye"></i></a>
						<?php endif; ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include 'layout/footer.php'; ?>