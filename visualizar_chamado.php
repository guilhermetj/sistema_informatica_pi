<?php include './layout/header.php'; ?>
<?php include './layout/menu.php'; ?>
<?php 
	require 'classes/Chamado.php';
	require 'classes/ChamadoDAO.php';

	$chamado = new Chamado();

	if(isset($_GET['id']) && $_GET['id'] != ''){
		$id = $_GET['id'];
		$chamadoDAO = new ChamadoDAO();
		$chamado = $chamadoDAO->get($id);
	}
	$nome = $_SESSION['nome'];
?>

<style>
    .container {
        margin-bottom: 50px;
    }
    .funcionario {
        margin: 0 auto;
        padding: 0 auto;
        width: 50%;
        margin-right: 210px;

    }
    spam {
        color: #A9A9A9;
    }
</style>

<div class="container">
	<div class="text-center">	
	<strong>Chamado Número <?php echo $chamado->getId() ?></strong>
	</div>
	<div class="container">
	<label>Status: <?php echo $chamado->getStatus() ?></label><br>
	<label>Data da abertura: <?php echo $chamado->getAbertura() ?></label><br>
	<label>Cliente: <?php echo $chamado->getIdCliente() ?></label><br>
	<label>Equipamento: <?php echo $chamado->getEquipamento() ?></label><br>
	<label>Descrição: <?php echo $chamado->getDescricao() ?></label><br>
	</div>
	<div class="container">
		<form action="controle_chamado.php?acao=aceitarChamado" method="post">
			<input type="hidden" name="id" id="id" value="<?=$chamado->getId()?>">
			<input type="hidden" name="funcionario" id="funcionario" value="<? echo $nome ?>">
			<input type="hidden" name="status" id="status" value="Em andamento">
			<button type="submit" class="btn btn-success" onclick="return confirm('Deseja aceitar esse chamado?')">Aceitar</button>	
			<a href="chamado_espera.php" class="btn btn-primary">Voltar</a>
		</form>
	</div>
</div>

<?php include './layout/footer.php'; ?> 