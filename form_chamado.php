<?php include './layout/header.php'; ?>
<?php 
	require 'classes/Chamado.php'; 
	require 'classes/Cliente.php';
	require 'classes/ChamadoDAO.php';
	require 'classes/ClienteDAO.php';
	$chamado = new Chamado();
	$clienteDAO = new clienteDAO();
	$clientes = $clienteDAO->listar();


	if(isset($_GET['id']) && $_GET['id'] != ''){
		$id = $_GET['id'];
		$chamadoDAO = new ChamadoDAO();
		$chamado = $chamadoDAO->get($id);
	}


?>
<div class="row">
	<div class="col">
		<p>&nbsp;</p>
		<form action="controle_chamado.php?acao=<?=($chamado->getId() != '' ? 'editar' : 'cadastrar')?>" method="post">
			<div class="form-group">
				<label for="id">ID:</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($chamado->getId() != '' ? $chamado->getId(): '')?>" readonly>
			</div>
			<div class="form-group">
				<label>Cliente:</label>
				<select class="custom-select" name="id_cliente"id="id_cliente">
				<?php foreach($clientes as $cliente){ ?>
					<option value="<?= $cliente->getID() ?>"><?= $cliente->getNome() ?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="status">Status:</label>
				<input type="text" class="form-control" name="status" id="status" value="<?=($chamado->getStatus() != '' ? $chamado->getStatus(): 'Ativo')?>" readonly>
			</div>
			<div class="form-group">
				<label for="equipamento">Equipamento:</label>
				<input type="text" class="form-control" name="equipamento" id="equipamento" value="<?=($chamado->getEquipamento() != '' ? $chamado->getEquipamento(): '')?>" required>
			</div>
			<div class="form-group">
				<label for="descricao">Descriçao:</label>
				<input type="text" class="form-control" name="descricao" id="descricao" value="<?=($chamado->getDescricao() != '' ? $chamado->getDescricao(): '')?>" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</div>
</div>

<?php include './layout/footer.php'; ?> 