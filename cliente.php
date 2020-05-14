<?php include 'layout/header.php'; 
?>
<?php 
require 'classes/Cliente.php';
require 'classes/ClienteDAO.php';
$clienteDAO = new ClienteDAO();
$clientes = $clienteDAO->listar();
?>
<?php 
	if(isset($_GET['msg']) && $_GET['msg'] != ''){
		echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
	}
 ?>
<div class="row" style="margin-top:40px">
	<div class="col-10">
		<h2>Gerenciar Cliente</h2>
	</div>
	<div class="col-2">
		<a href="form_cliente.php" class="btn btn-success">Nova</a>
	</div>
</div>
<div class="row">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Cpf</th>
				<th>Telefone</th>
				<th>Sexo</th>
				<th>E-mail</th>
				<th>Cep</th>
				<th>Endereço</th>
				<th>Criado</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($clientes as $cliente){ ?>
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
					<a href="form_cliente.php?id=<?= $cliente->getId() ?>">Editar</a> | 
					<a href="controle_cliente.php?acao=deletar&id=<?= $cliente->getId() ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


<?php include 'layout/footer.php'; ?> 