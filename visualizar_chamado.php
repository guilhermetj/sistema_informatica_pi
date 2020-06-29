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

	$id = $_SESSION['id_funcionario'];
?>



<div class="content-wrapper">
  	<div class="container-fluid" style="margin-top: 30px;">
	  	<div class="card text-center">
			<div class="card-header">
				Em andamento
			</div>
			<div class="card-body">
				<h5 class="card-title">Chamado n° <?php echo $chamado->getId() ?></h5><br>
				<div class="d_flex">
					<p>Status: <?php echo $chamado->getStatus() ?></p>
					<p>Data da abertura: <?php echo $chamado->getAbertura() ?></p>
					<p>Cliente: <?php echo $chamado->getIdCliente() ?></p>
					<p>Equipamento: <?php echo $chamado->getEquipamento() ?></p>
					<p>Descrição: <?php echo $chamado->getDescricao() ?></p>
				</div><br>
				<form action="controle_chamado.php?acao=aceitarChamado" method="post">
					<input type="hidden" name="id" id="id" value="<?=$chamado->getId()?>">
					<input type="hidden" name="id_funcionario" id="id_funcionario" value="<?php echo $id ?>">
					<input type="hidden" name="status" id="status" value="Em andamento">
					<button type="submit" class="btn btn-success" onclick="return confirm('Deseja aceitar esse chamado?')">Aceitar</button>	
					<a href="chamado_espera.php" class="btn btn-primary">Voltar</a>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include './layout/footer.php'; ?> 