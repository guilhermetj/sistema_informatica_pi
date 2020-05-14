<?php include './layout/header.php'; ?>
<?php 
	require 'classes/Cliente.php'; 
	require 'classes/ClienteDAO.php';
	$cliente = new Cliente();
	
	if(isset($_GET['id']) && $_GET['id'] != ''){
		$id = $_GET['id'];
		$clienteDAO = new ClienteDAO();
		$cliente = $clienteDAO->get($id);
	}


?>
<div class="row">
	<div class="col">
		<p>&nbsp;</p>
		<form action="controle_cliente.php?acao=<?=($cliente->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
			<div class="form-group">
				<label for="id">ID:</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($cliente->getId() != '' ? $cliente->getId(): '')?>" readonly>
			</div>
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?=($cliente->getNome() != '' ? $cliente->getNome(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="cpf">CPF:</label>
				<input type="text" class="form-control" name="cpf" id="cpf" value="<?=($cliente->getCpf() != '' ? $cliente->getCpf(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="telefone">Telefone:</label>
				<input type="text" class="form-control" name="telefone" id="telefone" 
				value="<?=($cliente->getTelefone() != '' ? $cliente->getTelefone(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="sexo">Sexo:</label>
				<input type="text" class="form-control" name="sexo" id="sexo" value="<?=($cliente->getSexo() != '' ? $cliente->getSexo(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" id="email" value="<?=($cliente->getEmail() != '' ? $cliente->getEmail(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="cep">Cep:</label>
				<input type="text" class="form-control" name="cep" id="cep" value="<?=($cliente->getCep() != '' ? $cliente->getCep(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="endereco">Endereço:</label>
				<input type="text" class="form-control" name="endereco" id="endereco" value="<?=($cliente->getEndereco() != '' ? $cliente->getEndereco(): '')?>" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</div>
</div>

<?php include './layout/footer.php'; ?> 