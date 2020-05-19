<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
require 'classes/Cliente.php';
require 'classes/ClienteDAO.php';
$clienteDAO = new ClienteDAO();
$clientes = $clienteDAO->listar();
?>
<div style="width: 100%;">
	<?php
	if (isset($_GET['msg']) && $_GET['msg'] != '') {
		echo '<div class="alert alert-info">' . $_GET['msg'] . '</div>';
	}
	?>
	<table class="table">
		<thead style="text-align: center;">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>Telefone</th>
				<th>Sexo</th>
				<th>E-mail</th>
				<th>Cep</th>
				<th>Endereço</th>
				<th>Criado</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody style="text-align: center;" class="table-striped">
			<?php foreach ($clientes as $cliente) { ?>
				<tr>
					<td><?= $cliente->getId() ?></td>
					<td><?= $cliente->getNome() ?></td>
					<td><?= $cliente->getCpf() ?></td>
					<td><?= $cliente->getTelefone() ?></td>
					<td><?= $cliente->getSexo() ?></td>
					<td><?= $cliente->getEmail() ?></td>
					<td><?= $cliente->getCep() ?></td>
					<td><?= $cliente->getEndereco() ?></td>
					<td><?= $cliente->getCreated() ?></td>
					<td>
						<a class="btn btn-warning" style="padding-right: 8px;" href="form_cliente.php?id=<?= $cliente->getId() ?>"><i class="far fa-edit"></i></a>
						<a class="btn btn-danger" href="controle_cliente.php?acao=deletar&id=<?= $cliente->getId() ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<!-- <div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2 style="font-weight: bold">Clientes</h2><br>
	</div>
	<div style="padding-left: 99px;">
		<a href="form_cliente.php" style="font-weight: bold;" class="btn btn-success">Nova</a>
	</div>
</div>
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th class="th">ID</th>
			<th class="th">Nome</th>
			<th class="th">CPF</th>
			<th class="th">Telefone</th>
			<th class="th">Sexo</th>
			<th class="th">E-mail</th>
			<th class="th">Cep</th>
			<th class="th">Endereço</th>
			<th class="th">Criado</th>
			<th class="th">Ação</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($clientes as $cliente) { ?>
			<tr>
				<td><?= $cliente->getId() ?></td>
				<td><?= $cliente->getNome() ?></td>
				<td><?= $cliente->getCpf() ?></td>
				<td><?= $cliente->getTelefone() ?></td>
				<td><?= $cliente->getSexo() ?></td>
				<td><?= $cliente->getEmail() ?></td>
				<td><?= $cliente->getCep() ?></td>
				<td><?= $cliente->getEndereco() ?></td>
				<td><?= $cliente->getCreated() ?></td>
				<td>
					<a class="btn btn-warning" style="padding-right: 8px;" href="form_cliente.php?id=<?= $cliente->getId() ?>"><i class="far fa-edit"></i></a> 
					<a class="btn btn-danger" href="controle_cliente.php?acao=deletar&id=<?= $cliente->getId() ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table> -->

<?php include 'layout/footer.php'; ?>