<?php include './layout/header.php'; ?>
<?php 
	require 'classes/Funcionario.php'; 
	require 'classes/FuncionarioDAO.php';
	$funcionario = new Funcionario();
	
	if(isset($_GET['id']) && $_GET['id'] != ''){
		$id = $_GET['id'];
		$funcionarioDAO = new FuncionarioDAO();
		$funcionario = $funcionarioDAO->get($id);
	}


?>
<div class="row">
	<div class="col">
		<p>&nbsp;</p>
		<form action="controle_funcionario.php?acao=<?=($funcionario->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
			<div class="form-group">
				<label for="id">ID:</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($funcionario->getId() != '' ? $funcionario->getId(): '')?>" readonly>
			</div>
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?=($funcionario->getNome() != '' ? $funcionario->getNome(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="cpf">CPF:</label>
				<input type="text" class="form-control" name="cpf" id="cpf" value="<?=($funcionario->getCpf() != '' ? $funcionario->getCpf(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="rg">RG:</label>
				<input type="text" class="form-control" name="rg" id="rg" value="<?=($funcionario->getRg() != '' ? $funcionario->getRg(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" id="email" value="<?=($funcionario->getEmail() != '' ? $funcionario->getEmail(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="cep">Cep:</label>
				<input type="text" class="form-control" name="cep" id="cep" value="<?=($funcionario->getCep() != '' ? $funcionario->getCep(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="cargo">Cargo:</label>
				<input type="text" class="form-control" name="cargo" id="cargo" value="<?=($funcionario->getCargo() != '' ? $funcionario->getCargo(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="telefone">Telefone:</label>
				<input type="text" class="form-control" name="telefone" id="telefone" value="<?=($funcionario->getTelefone() != '' ? $funcionario->getTelefone(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="tituloEleitor">Titulo Eleitor:</label>
				<input type="text" class="form-control" name="tituloEleitor" id="tituloEleitor" value="<?=($funcionario->getTituloEleitor() != '' ? $funcionario->getTituloEleitor(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="historicoEscolar">Historico Escolar:</label>
				<input type="text" class="form-control" name="historicoEscolar" id="historicoEscolar" value="<?=($funcionario->getHistoricoEscolar() != '' ? $funcionario->getHistoricoEscolar(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="ctps">CTPS:</label>
				<input type="text" class="form-control" name="ctps" id="ctps" value="<?=($funcionario->getCtps() != '' ? $funcionario->getCtps(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="sexo">Sexo:</label>
				<input type="text" class="form-control" name="sexo" id="sexo" value="<?=($funcionario->getSexo() != '' ? $funcionario->getSexo(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="senha">Senha:</label>
				<input type="text" class="form-control" name="senha" id="senha" 
				value="<?=($funcionario->getSenha() != '' ? $funcionario->getSenha(): '')?>" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</div>
</div>

<?php include './layout/footer.php'; ?> 