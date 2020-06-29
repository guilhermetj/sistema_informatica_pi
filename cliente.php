<?php include 'layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php
$permissoes = retornaControle('cliente');
if(empty($permissoes)) {
	header("Location: adm.php?msg=Acesso negado.");
}
require 'classes/Cliente.php';
require 'classes/ClienteDAO.php';
$clienteDAO = new ClienteDAO();
$clientes = $clienteDAO->listar();
?>


<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px; margin-bottom: 130px;">
	  	<div class="h3topo" style="text-align: center; margin-bottom: 40px;">
			<h3>Formulário de clientes</h3>
    	</div>
		<table class="table text-center" >
			<thead>
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>Telefone</th>
					<th>E-mail</th>
					<th>Cep</th>
					<th>Endereço</th>
					<?php if($permissoes['editar']): ?>	
					<th>Ação</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody class="table-striped">
				<?php foreach ($clientes as $cliente) { ?>
					<tr>
						<td><?= $cliente->getNome() ?></td>
						<td><?= $cliente->getCpf() ?></td>
						<td><?= $cliente->getTelefone() ?></td>
						<td><?= $cliente->getEmail() ?></td>
						<td><?= $cliente->getCep() ?></td>
						<td><?= $cliente->getEndereco() ?></td>
						<td>
						<?php if($permissoes['editar']): ?>	
							<a class="btn btn-warning" style="padding-right: 8px;" href="form_cliente.php?id=<?= $cliente->getId() ?>"><i class="far fa-edit"></i></a>
							<?php endif; ?>
							<?php if($permissoes['deletar']): ?>
							<a class="btn btn-danger" href="controle_cliente.php?acao=deletar&id=<?= $cliente->getId() ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash"></i></a>
							<?php endif; ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>



<?php include 'layout/footer.php'; ?>



