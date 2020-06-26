<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
$permissoes = retornaControle('permissoes');
require 'classes/Permissao.php';
require 'classes/PermissaoDAO.php';
$permissaoDAO = new PermissaoDAO();
$Permissoes = $permissaoDAO->listarPermissao();
?>
<div style="width: 100%;">
	<?php
	if (isset($_GET['msg']) && $_GET['msg'] != '') {
		echo '<div class="alert alert-info text-center">' . $_GET['msg'] . '</div>';
	}
	?>
	<a href="form_cargos.php" class="btn btn-primary">Cadastro Cargo</a>	
	<a href="form_controle.php" class="btn btn-primary">Cadastro Controle</a>	
	<table class="table text-center">
		<thead>
			<tr>
				<th>ID</th>
				<th>Controle</th>
				<th>Cargo</th>
				<th>Ler</th>
				<th>Editar</th>
				<th>Cadastrar</th>
				<th>Deletar</th>
				<th>Ação</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($Permissoes as $permissao) { ?>
				<tr>
					<td><?= $permissao->getId() ?></td>
					<td><?= $permissao->nome_cargo; ?></td>
					<td><?= $permissao->nome_controle; ?></td>
					<td><?= $permissao->getLer() ?></td>
					<td><?= $permissao->getEditar() ?></td>
					<td><?= $permissao->getCadastrar() ?></td>
					<td><?= $permissao->getDeletar() ?></td>
					<td>						
						<?php if($permissoes['editar']): ?>
						<a class="btn btn-warning" style="padding-right: 8px;" href="form_permissao.php?id=<?= $permissao->getId() ?>"><i class="far fa-edit"></i></a>
						<?php endif; ?>
						<?php if($permissoes['deletar']): ?>
						<a class="btn btn-danger" href="controle_permissao.php?acao=deletar&id=<?= $permissao->getId() ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash"></i></a>
						<?php endif; ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include 'layout/footer.php'; ?>