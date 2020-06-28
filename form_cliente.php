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

<style>
  .d_flex {
    margin: 0 330px 0 330px;
  }
</style>

<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px;">
		<div class="h3topo" style="text-align: center; margin-right: 75px;">
			<h3>Formulário de Clientes</h3>
			<spam>Preencha todos os campos abaixo</spam>
		</div><br>
    	<div class="d_flex">
			<form action="controle_cliente.php?acao=<?=($cliente->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
				<div class="form-group">
					<input type="hidden" name="id" class="form-control" id="id" value="<?=($cliente->getId() != '' ? $cliente->getId(): '')?>" readonly>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nome">Nome</label>
						<input type="text" name="nome" class="form-control" id="nome" value="<?=($cliente->getNome() != '' ? $cliente->getNome(): '')?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="cpf">CPF</label>
						<input type="text" name="cpf" class="form-control" id="cpf" value="<?=($cliente->getCpf() != '' ? $cliente->getCpf(): '')?>" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-10">
						<label for="endereco">Endereço</label>
						<input type="text" name="endereco" class="form-control" id="endereco" value="<?=($cliente->getEndereco() != '' ? $cliente->getEndereco(): '')?>" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="cep">CEP</label>
						<input type="text" name="cep" class="form-control" id="cep" value="<?=($cliente->getCep() != '' ? $cliente->getCep(): '')?>" required>
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" id="email" value="<?=($cliente->getEmail() != '' ? $cliente->getEmail(): '')?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="sexo">Sexo</label>
						<select class="custom-select" name="sexo"id="sexo">
							<option value="">Selecione</option>
							<option value="Femenino"<?= ($cliente->getSexo() == 'Feminino' ? 'selected="selected"' : '')?> >Feminino</option>
							<option value="Masculino" <?= ($cliente->getSexo() == 'Masculino' ? 'selected="selected"' : '') ?>>Masculino</option>
							<option value="Não informado" <?= ($cliente->getSexo() == 'Não informado' ? 'selected="selected"' : '') ?>>Não informado</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="telefone">Telefone</label>
						<input type="text" class="form-control" name="telefone" id="telefone" 
						value="<?=($cliente->getTelefone() != '' ? $cliente->getTelefone(): '')?>" required>
					</div>
				</div>
				<button type="submit" href="cliente.php" class="btn btn-success" style="width: 83%">Salvar</button>
			</form>
		</div>
	</div>
</div>
<?php include './layout/footer.php'; ?> 