<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
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
<div class="container">
		<p>&nbsp;</p>
		<form action="controle_cliente.php?acao=<?=($cliente->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
			<div class="form-row">
					<div class="form-group">
						<input type="hidden" class="form-control" name="id" id="id" value="<?=($cliente->getId() != '' ? $cliente->getId(): '')?>" readonly>
					</div>
					<div class="form-group col-md-4">
						<label for="nome">Nome:</label>
						<input type="text" class="form-control" name="nome" id="nome" value="<?=($cliente->getNome() != '' ? $cliente->getNome(): '')?>" required>
					</div>
					<div class="form-group col-md-2">
						<label for="cpf">CPF:</label>
						<input type="text" class="form-control" name="cpf" id="cpf" value="<?=($cliente->getCpf() != '' ? $cliente->getCpf(): '')?>" required>
					</div>
					<div class="form-group col-md-2">
						<label for="telefone">Telefone:</label>
						<input type="text" class="form-control" name="telefone" id="telefone" 
						value="<?=($cliente->getTelefone() != '' ? $cliente->getTelefone(): '')?>" required>
					</div>
					<div class="form-group col-md-2">
						<label for="sexo">Sexo:</label>
							<select class="custom-select" name="sexo"id="sexo">
								<option value="">Selecione</option>
								<option value="Femenino"<?= ($cliente->getSexo() == 'Feminino' ? 'selected="selected"' : '')?> >Feminino</option>
								<option value="Masculino" <?= ($cliente->getSexo() == 'Masculino' ? 'selected="selected"' : '') ?>>Masculino</option>
								<option value="Não informado" <?= ($cliente->getSexo() == 'Não informado' ? 'selected="selected"' : '') ?>>Não informado</option>
							</select>
					</div>
					<div class="form-group col-md-4">
						<label for="email">Email:</label>
						<input type="text" class="form-control" name="email" id="email" value="<?=($cliente->getEmail() != '' ? $cliente->getEmail(): '')?>" required>
					</div>
					<div class="form-group col-md-2">
						<label for="cep">Cep:</label>
						<input type="text" class="form-control" name="cep" id="cep" value="<?=($cliente->getCep() != '' ? $cliente->getCep(): '')?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="endereco">Endereço:</label>
						<input type="text" class="form-control" name="endereco" id="endereco" value="<?=($cliente->getEndereco() != '' ? $cliente->getEndereco(): '')?>" required>
					</div>
			</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Salvar</button>
					</div>
		</form>
</div>

<?php include './layout/footer.php'; ?> 