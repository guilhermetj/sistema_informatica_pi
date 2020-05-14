<?php include 'layout/header.php'; 
?>
<?php 
require 'classes/Funcionario.php';
require 'classes/FuncionarioDAO.php';
$funcionarioDAO = new FuncionarioDAO();
$funcionarios = $funcionarioDAO->listar();
?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != ''){
		echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
 ?>
<div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2>Gerenciar Funcionario</h2>
	</div>
	<div class="col-2">
		<a href="form_funcionario.php" class="btn btn-success">Nova</a>
	</div>
</div>
<div class="row">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Cpf</th>
				<th>Rg</th>
				<th>Email</th>
				<th>Cep</th>
				<th>Cargo</th>
				<th>Telefone</th>
				<th>Titulo Eleitor</th>
				<th>Historico Escolar</th>
				<th>Ctps</th>
				<th>Sexo</th>
				<th>Senha</th>
				<th>Criado</th>
				<th>Açoes</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($funcionarios as $funcionario){ ?>
			<tr>
				<td><?= $funcionario->getId() ?></td>
				<td><?= $funcionario->getNome() ?></td>
				<td><?= $funcionario->getCpf() ?></td>
				<td><?= $funcionario->getRg() ?></td>
				<td><?= $funcionario->getEmail() ?></td>
				<td><?= $funcionario->getCep() ?></td>
				<td><?= $funcionario->getCargo() ?></td>
				<td><?= $funcionario->getTelefone() ?></td>
				<td><?= $funcionario->getTituloEleitor() ?></td>
				<td><?= $funcionario->getHistoricoEscolar() ?></td>
				<td><?= $funcionario->getCtps() ?></td>
				<td><?= $funcionario->getSexo() ?></td>
				<td><?= $funcionario->getSenha() ?></td>
				<td><?= $funcionario->getCreated() ?></td>
				<td>
					<a href="form_funcionario.php?id=<?= $funcionario->getId() ?>">Editar</a> | 
					<a href="controle_funcionario.php?acao=deletar&id=<?= $funcionario->getId() ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


<?php include 'layout/footer.php'; ?> 